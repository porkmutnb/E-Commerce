$(document).ready(function () {
    var obj, parameters, xmlhttp;
    obj = { "name":"datauser" };
    parameters = JSON.stringify(obj);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var obj2 = JSON.parse(xhttp.responseText);
            console.log(obj2);
            var render = "";
            for (var i=0;i<obj2.length;i++){
                render +=   "<tr class=\"tr\">" +
                                "<td align=\"center\">"+(i+1)+"</td>" +
                                "<td>"+obj2[i].username+"</td>" +
                                "<td>"+obj2[i].email+"</td>" +
                                "<td align=\"center\">"+obj2[i].genderName+"</td>" +
                                "<td align=\"center\">"+obj2[i].telephone+"</td>" +
                            "</tr>";
            }


            $('#listuser').html(render);
        }
    };
    xhttp.open("GET", "../controller/backoffice/BackfficeController.php?x="+parameters, true);
    xhttp.send();
});
