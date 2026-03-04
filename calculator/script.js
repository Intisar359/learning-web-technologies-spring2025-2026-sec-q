function calculate(operator) {

    let n1 = document.getElementById("num1").value;
    let n2 = document.getElementById("num2").value;

    if(n1 ===""||n2 ===""){
        document.getElementById("result").innerHTML ="Please enter both numbers.";
        return;
    }
    let num1 = parseFloat(n1);
    let num2 = parseFloat(n2);
    let res;

    if (operator==="+"){
        res = num1+num2;
    }
    else if(operator==="-"){
        res = num1-num2;
    }
    else if(operator==="*"){
        res = num1* num2;
    }
    else if(operator=== "/"){
        if(num2=== 0) {
            document.getElementById("result").innerHTML ="Cannot divide by zero.";
            return;
        }
        res = num1 /num2;
    }
    document.getElementById("result").innerHTML = "Result: " + res;
}