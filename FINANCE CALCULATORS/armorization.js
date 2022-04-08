//startover button causes all the cells to be empptied
function startOver() {
 //we want the loan info and table and inputs to disapper
 
 // document.getElementById("loan_amount") = "";
 document.loan_form.loan_amt.value = "";
 document.loan_form.months.value = "";
 document.loan_form.rate.value = "";
 document.loan_form.extra.value = 0; 

 document.getElementById("loan_info").innerHTML = "";
 document.getElementById("table").innerHTML = "";
}

function validate() {
 
 var loan_amt = document.loan_form.loan_amt.value;
 var months = document.loan_form.months.value;
 var rate = document.loan_form.rate.value;
 var extra = document.loan_form.extra.value;

 // isNaN(Number(loan_amt)) checks to see if its a number OR FLOAT
 // eg Number(monkey)=NaN

 if (loan_amt<=0 || isNaN(Number(loan_amt)) ) { 
  alert("Please enter a valid loan amount");
  document.loan_form.loan_amt.value = "";
 }
 else if (months <= 0 || parseInt(months) != months) {
  // months= 5.5 ......... parseint(5.5)=5 5!=5.5 
  //parseInt - returns an integer eg parseInt(5.5)=5  parseInt(monkey)=NaN
  alert("Please enter a valid number of Months");
   document.loan_form.months.value = "";
 }
 else if (rate<=0 || isNaN(Number(rate))){
  alert("please enter valid interest rates");
  document.loan_form.rate.value = "";
 }
 else if (extra<0 || isNaN(Number(extra)) ) {
  alert("Please enter valid extra payment");
   document.loan_form.extra.value = 0; 
 }
 else {
  // alert(loan_amt + extra); does them as strings and concatenates them together
 // alert("validation complete");
 // alert(parseFloat(loan_amt) + parseFloat(extra)); //parse FLoat chnages thosse strings to a float
 
  calculate(parseFloat(loan_amt),parseInt(months), parseFloat( rate),  parseFloat(extra));
 }
  
}

function calculate(loan_amt, months, rate, extra) {
 i = rate / 100;//to make it a decimal

 var monthlyPayment = loan_amt * (i / 12) * Math.pow((1 + i / 12), months) / (Math.pow((1 + i / 12), months) - 1);
 // alert(round(monthlyPayment,2));
 
 // we want to show the loan info
 var info = "";
 
 info += "<table width='250'>";
 // line 1
 info += "<tr><td>Loan Amount:</td>";
 info += "<td align='right'>$"+ loan_amt+"</td></tr>"
 // line 2
 info += "<tr><td>Number of Months:</td> ";
 info += "<td align='right'>"+ months +"</td></tr>"

 // line 3
 info += "<tr><td>Interest Rate:</td> ";
 info += "<td align='right'>"+ rate +"%</td></tr>"
 //line 4
 info += "<tr><td>Monthly payment:</td>";
 info += "<td align='right'>$" + round(monthlyPayment,2) + "</td></tr>" //must round to 2 dp
 
 // line 5
 info += "<tr><td>+Extra:</td>";
 info += "<td align='right'>$" + extra + "</td></tr>"
 
 // line 6
  info += "<tr><td>Total Payment:</td> ";
 info += "<td align='right'>$" + round(monthlyPayment+extra ,2) + "</td></tr>"
     
 document.getElementById("loan_info").innerHTML = info; 
 // info is a string containing all the thml table elements

// table entries
 var table = ""; //empty

 table += "<table cellpadding='15' border='1'>"
 // row 1

 table += "<tr>";
 table += "<td width='30'>0</td>";
 table += "<td width='60'>&nbsp</td>";
 table += "<td width='60'>&nbsp</td>";
 table += "<td width='60'>&nbsp</td>";
 table += "<td width='85'>&nbsp</td>";
 table += "<td width='70'>" + round(loan_amt, 2) + "</td>";
 table += "</tr>";

 var current_balance = loan_amt;
 var payment_counter = 1;
 var total_interest = 0;
 var towards_interest = 0;
 var towards_balance = 0;

 monthlyPayment = monthlyPayment + extra;
 

  // loop to make sure the table continues until we have a zero
 while (current_balance > 0) {
   // create rows
  towards_interest = (i / 12) * current_balance; //this calcutes what portion of your monthly payment goes towards interest
  
  // we want the last payment to be exact such that the bank doesn't owe you money
  // ie such that its not a negative balance

  if (monthlyPayment > current_balance) {
   monthlyPayment = current_balance + towards_interest;
  }

  towards_balance = monthlyPayment - towards_interest;
  total_interest = total_interest + towards_interest;
  current_balance = current_balance - towards_balance;

  table += "<tr>";
  table += "<td>"+payment_counter+"</td>";
  table += "<td>"+round(monthlyPayment,2)+"</td>";
  table += "<td>" + round(towards_balance, 2) + "</td>";
  table += "<td>"+round(towards_interest,2)+"</td>";
  table += "<td>"+round(total_interest,2)+"</td>";
  table += "<td>"+round(current_balance,2)+"</td>";
  table += "</tr>";
  // increments it to show the payment number
  payment_counter++;
 }

 
 table += "</table>";

 document.getElementById("table").innerHTML = table;
}

//to round to two decimals
function round(num, dec)
{
 return (Math.round(num * Math.pow(10, dec)) / Math.pow(10, dec)).toFixed(dec);
}