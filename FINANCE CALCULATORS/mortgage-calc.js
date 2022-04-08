// the code

// ORDER OF OPERATIONS
//the formula is C= ((p*r) * Math.pow((1+r),n)/(Math.pow((1+4),n)-1)

 //call when we click the button
 //@param p float Amount Borrowed
 //@param r interest as a percentage
 //@param n term in years

function calcultageMortgage(p,r,n) {
 var monthlyPayments = null;
 // convert this percentage to a decimal
 r = percentToDecimal(r);

 //convert years to months
 n = yearsToMonths(n);
 var pmt = ((p * r) * Math.pow((1 + r), n) / (Math.pow((1 + r), n) - 1));

 //returns it as a number to 2 dp
 return parseFloat(pmt.toFixed(2));
}

function percentToDecimal(percent) {
 
 //to get the monthly interest rate
 return (percent / 12)/100;
}

function yearsToMonths(year) {
 
 return year * 12;
}




var btn = document.getElementById("btn-Calculate");
btn.onclick = function () {
 //create the param
 var cost = document.getElementById("inCost").value;

 //cost is

 
 var downPayment = document.getElementById("inDown").value;
 var interest = document.getElementById("inAPR").value;
 var term = document.getElementById("inPeriod").value;

 // console.log(cost, downPayment, interest, term);

 //gives reference to element and not the text inside of it.
 
 // ....
 var amountBorrowed = cost - downPayment;


 var pmt = calcultageMortgage(amountBorrowed, interest, term);
 postPayments(pmt);
};
 
function postPayments(payment){
 var htmlEl = document.getElementById("outMonthly");
 //enter the text via a method
 htmlEl.innerText = "$"+ payment;
}

// trial
function reset() {
 document.getElementById("inCost").value = 0;
 document.getElementById("inDown").value = 0;
 document.getElementById("inAPR").value = 0;
 document.getElementById("inPeriod").value = 0;

 document.getElementById("outMonthly").innerHTML = 0;
}