function addItem(button){
    const card = button.parentNode;
    const info = card.querySelectorAll('.info h3');
    const name = info[0].innerText;
    const price = parseFloat(info[1].innerText, '');

    const tbody = document.querySelector('#right table tbody');
    const total = price;
    const newrow = `<tr>
        <td>${name}</td>
        <td><button onclick="change(this,1)">+</button><span>1</span><button onclick="change(this,-1)">-</button></td>
        <td>${price}</td>
        <td>${total}</td>
    </tr>`
    const existingRow = findExistingRow(name);
    if(existingRow){
        const quantity = existingRow.querySelector('td span')
        quantity.innerText = parseFloat(quantity.innerText,'')+1;
        const cost = parseFloat(existingRow.querySelectorAll('td')[2].innerText,'');
        const totalcell = existingRow.querySelectorAll('td')[3];
        const newTotal = cost * quantity.innerText;
        totalcell.innerText = newTotal;

    }
    else{
        tbody.innerHTML += newrow;
    }
    calculateTotal();

    // Get the target element
    var targetElement = document.querySelector("#tiffins");

    // Calculate the position to scroll to (bottom of the element)
    var targetPosition = targetElement.offsetTop + targetElement.offsetHeight - window.innerHeight - 130;
    
    // Scroll to the calculated position with smooth behavior
    window.scrollTo({
      top: targetPosition,
      behavior: "smooth"
    });
    
}

function calculateTotal(){
    const rows = document.querySelectorAll('#bill tr');
    let total = 0;
    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        total += parseFloat(cells[3].innerText,'');
    }
    const billtotal = document.querySelector('#right h2 span');
    billtotal.innerText = total;
}

function findExistingRow(selectedItem) {
    const rows = document.querySelectorAll('#bill tr');
    for (let i = 0; i < rows.length; i++) {
      const cells = rows[i].getElementsByTagName('td');
        if (cells[0].textContent === selectedItem) {
            return rows[i];
        }
    }
}

function change(button, value){
    const tag = button.parentNode;
    const quantity = tag.querySelector('span');
    const existingRow = quantity.parentNode.parentNode;
    console.log(existingRow);
    const var1=parseFloat(quantity.innerText,'');
    if(var1+value === 0){
             existingRow.parentNode.removeChild(existingRow);
             calculateTotal();
             return;
    }
    quantity.innerText = var1+value;
    const cost = parseFloat(existingRow.querySelectorAll('td')[2].innerText,'');
    const totalcell = existingRow.querySelectorAll('td')[3];
    const newTotal = cost * quantity.innerText;
    totalcell.innerText = newTotal;
    calculateTotal();
}

