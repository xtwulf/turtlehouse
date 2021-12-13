// Function for changing the switch element
function checkElement (element_id) {
  
  
element = document.getElementById(element_id);

  if (element.innerText == "Automatisch") {
    element.innerText = "Manuell";
    document.getElementById('card1').hidden = false;
    document.getElementById('card2').hidden = false;
    return;
  }
  
element.innerText = "Automatisch";
document.getElementById('card1').hidden = true;
document.getElementById('card2').hidden = true;
return;
   


}
