
$(".subnav_name").slideUp();

$(".adminNav").click(function (e) { 
    switch(e.target.innerHTML){
        case "Projects": 
            $(".sub_proj").slideToggle();
            break;
        case "Reports":
            $(".sub_report").slideToggle();
            break;
        case "User":
            $(".sub_user").slideToggle();
            break;
    }
});

$(".userNav").click(function (e) { 
    switch(e.target.innerHTML){
        case "Projects": 
            $(".uSub-proj").slideToggle();
            break;
        case "Task":
            $(".uSub-task").slideToggle();
            break;
        case "Team":
            $(".uSub-team").slideToggle();
            break;
    }
});

$(".projList").click(function(e){
    fetch("/main/app.js/projTableData")
    .then(response => response.json())
    .then(data => {
        console.log(data);
        let table = document.querySelector('.project-table')
        data.forEach(row => {
            let tr = document.createElement('tr');
            tr.appendChild(document.createElement('th').innerText(data[0].id))
            tr.appendChild(document.createElement('th').innerText(data[0].title))
            tr.appendChild(document.createElement('th').innerHTML(
                "<th><div class=\"progress\">"+
                "<div class=\"progress-bar progress-bar-striped\" role=\"progressbar\" style=\"width: 50%\" aria-valuenow="+
                data[0].progress+" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>"+
                "</div></th>"
            ))
            tr.appendChild(document.createElement('th').innerText(data[0].endDate))
            tr.appendChild(document.createElement('th').innerText(data[0].status))
            tr.appendChild(document.createElement('th').innerHTML(
            "<select name=\"Action\" id=\"action\">"+
            "<option value=\"\" selected disabled>Action</option>"+
            "<option>View</option>"+
            "</select>"
            ))
            table.appendChild(tr)
        })
    })
});


