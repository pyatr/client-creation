function generatePageButtons() {
    let buttonsRoot = document.getElementById("buttons-grid");
    if (buttonsRoot != null) {
        for (let page = 1; page <= pages; page++) {
            let newNumberButton = document.createElement("button");
            newNumberButton.innerHTML = page;
            if (params.get("page") == page) {
                newNumberButton.className = "bottom-button-current";
            } else {
                newNumberButton.className = "bottom-button";
            }

            let newButtonSearchParams = new URLSearchParams({
                'page': page,
                'pageSize': pageSize
            });
            newNumberButton.onclick = () => {
                window.open("http://" + window.location.host + "/?" + newButtonSearchParams, "_self")
            }
            buttonsRoot.appendChild(newNumberButton);
        }
    }
}
