/**
 * Created by Gaurav on 26-02-2016.
 */


var n = prompt("No of Subjects?",0);
if(n != null)
    createTable(n);


function createTable(no){

    var rf = document.getElementById("resultForm");

    var resultTable = document.getElementById("resultTable");

    var noOfSubject = document.getElementById("noOfSubject");
    noOfSubject.value = no;

    for(var i=1;i<=no;i++){
        var newRow = document.createElement("tr");

        var srnoCol = document.createElement("td");
        var srno = document.createTextNode(""+i);

        srnoCol.appendChild(srno);
        newRow.appendChild(srnoCol);

        for(var j=0;j<6;j++){
            var newCol = document.createElement("td");
            var inputTag = document.createElement("input");
            inputTag.setAttribute("name", i + "-" + j);
            switch(j){
                case 0:
                    inputTag.setAttribute("type","number");
                    break;
                case 2:
                    inputTag.setAttribute("maxLength","2");
                    break;
                case 3:
                case 4:
                case 5:
                    inputTag.setAttribute("maxlength","1");
                    break;
            }
            newCol.appendChild(inputTag);
            newRow.appendChild(newCol);
        }
        resultTable.appendChild(newRow);
    }

}
