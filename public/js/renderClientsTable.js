function renderClientsTable(clients) {
    let tablesRoot = document.getElementById("clients-grid");
    if (tablesRoot == null) {
        return;
    }
    if (clients.length === 0) {
        let noClients = document.createElement("div");
        noClients.innerHTML = "<p>No clients</p>";
        tablesRoot.appendChild(noClients);
        return;
    }
    let baseTable = document.createElement("table");
    baseTable.className = "table-display";
    baseTable.innerHTML = "<table><tr><th>First name</th></tr><tr><th>Last name</th></tr><tr><th>EMail</th></tr><tr><th>Company name</th></tr><tr><th>Position</th></tr><tr><th>Phone number #1</th></tr><tr><th>Phone number #2</th></tr><tr><th>Phone number #3</th></tr></table>";
    clients.forEach(client => {
        let newTable = baseTable.cloneNode(true);
        let clientData = Object.values(client);
        //id is email address
        newTable.id = clientData[2];
        let tbody = newTable.getElementsByTagName("tbody")[0];
        for (let i = 0; i < tbody.children.length; i++) {
            let cell = document.createElement("td");
            cell.innerText = clientData[i];
            tbody.children[i].appendChild(cell);
        }
        let editLink = document.createElement("a");
        editLink.href = "/edit?email=" + clientData[2];
        editLink.text = "Edit";
        newTable.appendChild(editLink);
        let deleteLink = document.createElement("a");
        deleteLink.href = "/delete?email=" + clientData[2];
        deleteLink.text = "Delete";
        newTable.appendChild(deleteLink);
        tablesRoot.append(newTable);
    });
    baseTable.remove();
}
