function country() {
    var xmlhttp = new XMLHttpRequest();
    var url = "assets/car_type/car_type.json";
    xmlhttp.open("post", url, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            var myDiv = document.getElementById("myCar_type");
            //Create and append select list
            var selectList = document.createElement("select");
            selectList.id = "car_marque";
            selectList.name = "car_marque";
            selectList.className = "form-control";
            myDiv.appendChild(selectList);

            var ordered = {};
            Object.keys(myObj).sort().forEach(function(key) {
                ordered[key] = myObj[key];
            });
            // var ordered =Object.keys(myObj);
            // ordered.sort().forEach(function(key) {
            //     ordered[key] = myObj[key];
            // });

            for (var x in ordered) {
                var option = document.createElement("option");
                option.value = ordered[x];
                option.text = x;
                selectList.appendChild(option);
            }
            // console.log(ordered);
            // console.log(myObj);
        }
    };
//    document.getElementById("select").addEventListener("keypress", rwandaMap); 
}
window.onload = country();