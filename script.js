document.getElementById('calculateBtn').addEventListener('click',calculatetax)

function calculatetax(){
    const salary = parseFloat(document.getElementById('salary').value);
    const allowance = parseFloat(document.getElementById('allowance').value);
    
    if(isNaN(salary) || isNaN(allowance)){
        alert("Please fill in the space below")
    }

    const Monthlypay = salary + allowance;
    const housing = 3/100 * Monthlypay;
    const hospitaling = 2/100 * Monthlypay;
    const leave = 1.5/100 * Monthlypay;
    const tax = 1.5/100 * Monthlypay;
    const insurance = 2/100 * Monthlypay;
    const vat = 1.5/100 * Monthlypay;
    const Totaltax = housing + hospitaling + leave + tax + insurance + vat;
    const grosspay = Monthlypay - Totaltax;
    const annualpay = grosspay**2;

    displayResult(Monthlypay, housing, hospitaling, leave, tax, insurance, vat, Totaltax, grosspay, annualpay)
}

function displayResult(Monthlypay, housing, hospitaling, leave, tax, insurance, vat, Totaltax, grosspay, annualpay){

    const resultDiv = document.getElementById("Taxresults");

    resultDiv.innerHTML = `
        <h4>Result<h4>
        <table>
        <tr class="tablehead">
            <th>Variable</th>
            <td>Percentage</td>
            <td>Amount</td>
        </tr>
        <tr>
            <th>Housing</th>
            <td>3%</td>
            <td>N${housing.toFixed(2)}</td>
        </tr>
        <tr>
            <th>Hospitaling</th>
            <td>2%</td>
            <td>N${hospitaling.toFixed(2)}</td>
        </tr>
        <tr>
            <th>Leave</th>
            <td>1.5%</td>
            <td>N${leave.toFixed(2)}</td>
        </tr>
        <tr>
            <th>Tax</th>
            <td>1.5%</td>
            <td>N${tax.toFixed(2)}</td>
        </tr>
        <tr>
            <th>Insurance</th>
            <td>2%</td>
            <td>N${insurance.toFixed(2)}</td>
        </tr>
        <tr>
            <th>vat</th>
            <td>1.5%</td>
            <td>N${vat.toFixed(2)}</td>
        </tr>
        <tr>
            <th>TOTAL</th>
            <td></td>
            <td>N${Totaltax.toFixed(2)}</td>
        </tr>
        </table>
        <p>Grosspay: N${grosspay.toFixed(2)}</p>
        <p>Annualpay: N${annualpay.toFixed(2)}</p>
    `;
}
