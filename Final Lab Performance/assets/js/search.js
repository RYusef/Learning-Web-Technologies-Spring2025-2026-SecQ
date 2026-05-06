function searchEmployee(){
    let key = document.getElementById("search").value;

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controller/employeeController.php?key=" + key, true);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            let employees = JSON.parse(this.responseText);

            let text = "";

            for(let i = 0; i < employees.length; i++){
                text += "<tr>";
                text += "<td>" + employees[i].id + "</td>";
                text += "<td>" + employees[i].employee_name + "</td>";
                text += "<td>" + employees[i].contact_no + "</td>";
                text += "<td>" + employees[i].username + "</td>";
                text += "</tr>";
            }

            document.getElementById("result").innerHTML = text;
        }
    };

    xhttp.send();
}