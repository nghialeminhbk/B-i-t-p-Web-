var content = document.getElementById("content");
function load(url) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            content.innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}
var turn = 0;
console.log(turn);
function showdropdown(element){
        if(turn == 0){
            turn = 1;
            console.log(turn);
            document.getElementById('all_dropdown_content').setAttribute('style', 'display: block');
            document.getElementById('show_dropdown').innerHTML = '<i class="fas fa-chevron-up"></i>';
        }else{
            turn = 0;
            console.log(turn);
            document.getElementById('all_dropdown_content').setAttribute('style', 'display: none');
            document.getElementById('show_dropdown').innerHTML = '<i class="fas fa-chevron-down"></i>';
        }
}