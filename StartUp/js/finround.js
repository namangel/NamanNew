
// document.getElementById("notes").style.display = "none";
// document.getElementById("equity").style.display = "none";

function valfunc(){
    var x = document.getElementById("sec").value;
    
    if (x== "Preferred Equity" || x=="Common Equity")
    {
        document.getElementById("equity").style.display = "block";
        document.getElementById("notes").style.display = "none";
    }
    if(x=="Convertible Notes")
    {
        document.getElementById("notes").style.display = "block";
        document.getElementById("equity").style.display = "none";
    }
    if(x =="SecType")
    {
        document.getElementById("notes").style.display = "none";
        document.getElementById("equity").style.display = "none";
    }
    
}