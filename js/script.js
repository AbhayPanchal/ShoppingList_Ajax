window.addEventListener("load" , function(){
    function display(i){
        let html = "<div>";
        html += "<h5>" + i.item + "(" + i.quantity +")" + "</h5>";
        html += "</div>"
        return html;
    };

    function success(item){
        
        let object = "";

        for(let i=0; i< item.length; i++){
            object += display(item[i]);
        }
        
        let items = document.getElementById("items");
        items.innerHTML = object;
    }

    let button = document.getElementById("add");
    button.addEventListener("click", function(){
        let url = "server/index.php?item=" + $item + "&quantity=" + $quantity;

        console.log(url);

        fetch(url, {credentials:'include'})
            .then(response => response.json())
            .then(success);
    })
});