const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const session = require('express-session');
const path = require('path');
const app = express();


const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'usersdb'
});

db.connect((err) => {
  if (err) {
    throw err;
  }
  console.log('MySQL Connected...');
});
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());


app.use(session({
  secret: 'secret',
  resave: true,
  saveUninitialized: true
}));
app.use(express.static(path.join(__dirname, 'public')));


app.set('views', path.join(__dirname, 'views'));

app.set('view engine', 'ejs');

app.get('/views/import_students', (req, res) => {
    res.render('import_students');
});

app.get('/views/view_student', (req, res) => {
    res.render('view_student'); 
});

app.get('/views/viewsubject', (req, res) => {
    res.render('viewsubject');
});


app.post('/sample', (req, res) => {
  const { username, password } = req.body;
  const sql = 'SELECT * FROM users WHERE username = ? AND password = ?';
  db.query(sql, [username, password], (err, result) => {
    if (err) {
      res.status(500).json({ error: 'Database error' });
    } else {
      if (result.length > 0) {

        req.session.user = result[0];
        if (username === 'admin') {
          res.redirect('/dashboard1');
        } else {
          res.redirect('/student');
        }
      } else {
        res.status(401).json({ error: 'Invalid credentials' });
      }
    }
  });
});


app.get('/dashboard1', (req, res) => {
  res.render('dashboard1.ejs');
});


app.get('/student', (req, res) => {

  const { username } = req.session.user;

  const sql = 'SELECT * FROM udetail WHERE uname = ?';
  db.query(sql, [username], (err, results) => {
    if (err) {
      console.error('Error retrieving user details from database:', err);
      res.status(500).send('Internal Server Error');
      return;
    }

    const userDetails = results[0]; 

    let courseTable;
    if (userDetails.year === 3 && userDetails.sem === 2) {
      courseTable = 'threetwo';
    } else {
      courseTable = 'threeone';
    }
    const courseSql = `SELECT cname, fname FROM ${courseTable}`;
    db.query(courseSql, (err, courseResults) => {
      if (err) {
        console.error('Error retrieving course details from database:', err);
        res.status(500).send('Internal Server Error');
        return;
      }

      const courses = courseResults; 

      const rollNo=userDetails.roll;
      
      const sumSql = `
      SELECT cname, SUM(value) AS total_value
      FROM feedback
      WHERE cname IN (SELECT cname FROM ${rollNo})
      GROUP BY cname
    `;
    let sumData;
    db.query(sumSql, (err, sumResults) => {
      if (err) {
        console.error('Error retrieving sum data from database:', err);
        res.status(500).send('Internal Server Error');
        return;
      }
      sumData = sumResults.map(row => ({
        cname: row.cname,
        total_value: row.total_value
      }));
    });
   

      const rTableSql = `SELECT * FROM ${rollNo} `;
      db.query(rTableSql, [userDetails.roll], (err, rTableResults) => {
        if (err) {
          console.error('Error retrieving rTable details from database:', err);
          res.status(500).send('Internal Server Error');
          return;
        }
        const rTable=[];
        for(let i=0;i<6;i++){
            rTable[i]=rTableResults[i];
        }
        
        res.render('student.ejs', { user: req.session.user, userDetails, courses, rTable,sumData });
});
});
});});


app.get('/dashboard', (req, res) => {
  if (!req.session.user) {
    res.status(401).send('Unauthorized');
    return;
  }
  const { username } = req.session.user;

  const sql = 'SELECT * FROM udetail WHERE uname = ?';
  db.query(sql, [username], (err, results) => {
    if (err) {
      console.error('Error retrieving user details from database:', err);
      res.status(500).send('Internal Server Error');
      return;
    }
      const userDetails = results[0]; 
      res.render('dashboard.ejs', { user: req.session.user, userDetails});

    
  });
});


app.get('/subject', (req, res) => {
  const cname = req.query.cname;
  const fname = req.query.fname;
  const status = req.query.status;
  const roll = req.query.roll;
  const sem=req.query.sem;
  let tableName5 = "feedback";
  if(status!=0)
  {
    db.query(`SELECT value from ${tableName5} WHERE roll=?`,[roll],(err,result)=>
    {
      if (err) {
        throw err;
      }
      res.render('subject.ejs', { cname, fname, status, roll, Data: result,sem });
    });
  }
  else{
    res.render('subject.ejs', { cname, fname, status, roll, Data: null,sem });
  }
});


app.post('/subject', (req, res) => {
  const { cname, fname, roll, syll, dbt,impartiality,voice ,time,sem} = req.body; 
  const tableName = "feedback";
  const stu_table=roll;
  db.query(`INSERT INTO ${tableName} (cname, fname, roll, qname, value) VALUES (?, ?, ?, ?, ?)`, [cname, fname, roll, 'syllabus_completion', syll], (err, results) => {
    if (err) {
      throw err;
    }
    db.query(`INSERT INTO ${tableName} (cname, fname, roll, qname, value) VALUES (?, ?, ?, ?, ?)`, [cname, fname, roll, 'doubt_clarification', dbt], (err, results) => {
      if (err) {
        throw err;
      }
      db.query(`INSERT INTO ${tableName} (cname, fname, roll, qname, value) VALUES (?, ?, ?, ?, ?)`, [cname, fname, roll, 'impartiality', impartiality], (err, results) => {
        if (err) {
          throw err;
        }
        db.query(`INSERT INTO ${tableName} (cname, fname, roll, qname, value) VALUES (?, ?, ?, ?, ?)`, [cname, fname, roll, 'voice', voice], (err, results) => {
          if (err) {
            throw err;
          }
          db.query(`INSERT INTO ${tableName} (cname, fname, roll, qname, value) VALUES (?, ?, ?, ?, ?)`, [cname, fname, roll, 'Ontime', time], (err, results) => {
            if (err) {
              throw err;
            }

            db.query(`UPDATE  ${stu_table} set status= ? WHERE cname= ?`,[1,cname],(err,results)=>{
              if (err) {
                throw err;
              }
              db.query(`select SUM(status) from ${stu_table}`,(err,result2)=>
              {
                if (err) {
                  throw err;
                }
                let tb;
                if(sem==1){tb='sem31';}else{tb='sem32';}
                if(result2[0]["SUM(status)"] === 6){
                  db.query(`update ${tb} set status=1 where rollno=?`,[roll],(err,result9)=>{
                    if (err) {
                      throw err;
                    }
                  });
                }
                console.log("Sum of status:", result2[0]["SUM(status)"]);
              });
      res.redirect(`/subject?cname=${cname}&fname=${fname}&status=1&roll=${roll}`);
    });
  });
});
});
});
});
});

app.get('/views/stat', (req, res) => {
  // Execute SQL query to fetch average values
  db.query(
    `SELECT f.cname, AVG(f.value) AS average_score
      FROM feedback AS f
      INNER JOIN sem32 AS s ON f.roll = s.rollno
      WHERE s.status = 1
      GROUP BY f.cname`, (error, results, fields) => {
      if (error) {
          console.error('Error fetching data:', error);
          res.status(500).send('Internal Server Error');
          return;
      }

      // Pass fetched data to statistics.ejs template
      res.render('stat', { data: results });
  });
});


app.post('/view_student', (req, res) => {
  const { course_type, academic_year, student_year, semester } = req.body;
  res.redirect(`/displayStu?course_type=${course_type}&academic_year=${academic_year}&student_year=${student_year}&semester=${semester}`);

});


app.get('/displayStu', (req, res) => {
  const { course_type, academic_year, student_year, semester } = req.query;
  let tableName2;
  if (student_year == 3 && semester == 1) {
    tableName2 = 'sem31'; 
  } else {
    tableName2 = 'sem32';
  }
  const sql = `SELECT rollno,name,branch,gender FROM ${tableName2}`;
  db.query(sql, (err, results) => {
    if (err) {
      console.error('Error querying database: ' + err.stack);
      return res.status(500).send('Internal Server Error');
    }
    const result=results;
  res.render('displayStu', { result });
});});



app.post('/import_students',(req,res)=>{
const {academic_year,student_year,semester,rollno,name,dob,gender} =req.body;
let tableName3;
if(student_year ==3 && semester==1)
{
  tableName3='sem31';
}
else{
  tableName3='sem32';
}
const sql=`INSERT INTO ${tableName3} VALUES('${rollno}','${name}','CSE','${gender}','6987432186','${dob}',0)`;
db.query(sql, (err, results) => {
  if (err) {
    console.error('Error querying database: ' + err.stack);
    return res.status(500).send('Internal Server Error');
  }
res.send('<script>alert("Done");</script>');
});
});


app.get('/feedback_sub', (req, res) => {
  res.render('feedback_sub.ejs');
});

app.get('/views/resetpass', (req, res) => {
  res.render('resetpass.ejs'); 
});


app.post('/resetpass', (req, res) => {
  const studentRollNo = req.body.student_rollno;
  const newPassword = req.body.password;

  db.query('UPDATE users SET password = ? WHERE username = ?', [newPassword, studentRollNo], (error, results) => {
    if (error) {
      console.error('Error updating password:', error);
      return res.status(500).send('Error resetting password.');
    }

    if (results.affectedRows === 0) {
      return res.status(404).send('Student not found.');
    }

    res.send('Password reset successfully.');
// res.send('<script>alert("Password reset successfully");</script>');
// res.render('resetpass.ejs', { alertMessage: 'Password reset successfully' });

  });
});


app.get('/views/addsubject', (req, res) => {
  res.render('addsubject'); 
});


app.post('/addsubject', (req, res) => {
  const subjectName = req.body.subject_name;
  const facultyName = req.body.faculty_name;
  const academicYear = req.body.student_year;
  const semester = req.body.semester;


  let tableName;
  if(academicYear==3 && semester==1)
  {
    tableName='threeone';
  }
  else 
  {
    tableName='threetwo';
  }
  if (!tableName) {
    res.status(400).send('Invalid semester.');
    return;
  }

  const sql = `INSERT INTO ${tableName} (cname, fname) VALUES (?, ?)`;
  db.query(sql, [subjectName, facultyName], (error, results) => {
    if (error) {
      console.error('Error adding subject:', error);
      res.status(500).send('Error adding subject.');
      return;
    }
    // console.log('Subject added successfully:', results);
    // res.send('Subject added successfully.');
   res.send('<script>alert("Subject added successfully.");</script>');

  });
});


app.get('/views/showFeedback',(req,res)=>{
  const tableName6='feedback';

  db.query( `SELECT * FROM ${tableName6}`,(err,result)=>{
    if(err){
      throw err;
    }
    res.render('showFeedback.ejs',{result});
  });
});


app.get('/views/viewsubject', (req, res) => {
  res.render('viewsubject');
});


app.post('/viewsubject', (req, res) => {
  const academicYear = req.body.student_year;
  const semester = req.body.semester;
  const tableName5 = getTableName(academicYear, semester);
  const sql = `SELECT * FROM ${tableName5}`;
  db.query(sql, (error, results) => {
    if (error) {
      console.error('Error retrieving subjects:', error);
      res.status(500).send('Error retrieving subjects.');
      return;
    }
    res.render('viewsubres', { results });
  });
});



app.get("/views/viewsubres", (req, res) => {
  res.render('viewsubres');
});


function getTableName(academicYear, semester) {
  let tableName;
  if (academicYear == '3' && semester == '2') {
    tableName = 'threetwo';
  } else {
    tableName = 'threeone'; 
  }

  return tableName;
}


app.get('/sample', (req, res) => {
  res.render('sample.ejs');
});


app.get('/logout', (req, res) => {
  req.session.destroy((err) => {
    if (err) {
      console.error('Error destroying session:', err);
      res.status(500).send('Internal Server Error');
      return;
    }
    res.redirect('/sample');
  });
});


app.get('/dashboard', (req, res) => {
  res.render('dashboard.ejs'); 
});



const PORT = process.env.PORT || 4003;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));
