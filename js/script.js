const registerForm = document.getElementById("registerForm");
registerForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = {
        name: this.name.value,
        phone: this.phone.value,
        email: this.email.value,
        section: this.section.value,
        birthdate: this.birthdate.value,
        report: this.report.value,
        reportName: this.reportName.value,
    }

    console.log(formData);
    registerUser(formData).then(r => null);
});

function onReportChange() {
    let reportNameDiv = document.getElementById("reportNameDiv");
    let reportNameInput = document.getElementById("reportName");

    if (reportNameDiv.style.display === "none") {
        reportNameDiv.style.display = "block";
        reportNameInput.required = true;

    } else {
        reportNameDiv.style.display = "none";
        reportNameInput.required = false;
    }
}

async function registerUser(formData) {
    console.log(registerForm)

    const response = await fetch("/api/register.php", {
        method: "POST",
        body: JSON.stringify(formData)
    });

    if (response.ok) {
        const data = await response.text();
        console.log(data);

        window.location.href = `/result.php?id=${data}`;
    } else {
        window.location.href = "/fail.php";
    }
}

async function loadTable() {
    const response = await fetch("/api/get_data.php");
    const data = await response.json();
    console.log(data);

    let tableContent = document.getElementById("tableContent");
    tableContent.innerHTML = "";
    tableContent.innerText = "";

    data.forEach(e => {
        console.log(e)

        let tr = document.createElement('tr');

        tr.appendChild(document.createElement('td'));
        tr.appendChild(document.createElement('td'));
        tr.appendChild(document.createElement('td'));
        tr.appendChild(document.createElement('td'));
        tr.appendChild(document.createElement('td'));
        tr.appendChild(document.createElement('td'));

        tr.cells[0].appendChild(document.createTextNode(`${e.name}`))
        tr.cells[1].appendChild(document.createTextNode(`${e.phone}`))
        tr.cells[2].appendChild(document.createTextNode(`${e.email}`))
        tr.cells[3].appendChild(document.createTextNode(`${e.section}`))
        tr.cells[4].appendChild(document.createTextNode(`${e.birthdate}`))
        tr.cells[5].appendChild(document.createTextNode(`${e.reportName}`))

        tableContent.appendChild(tr);
    })

    console.log(tableContent);

    //parent.append(el);

}