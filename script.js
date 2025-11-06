function getGrade(Score) {
    if (Score >= 75) return "A1";
    else if (Score >= 65) return "B2";
    else if (Score >= 55) return "C3";
    else if (Score >= 50) return "C4";
    else if (Score >= 45) return "D7";
    else if (Score >= 40) return "E8";
    else return "F9";
}

function calculateResults() {
    let subjects = ["en", "mat", "phy", "che", "bio", "geo", "civ", "eco", "ict"];
    let total = 0;
    
    subjects.forEach(subjects => {
        let test = parseInt(document.getElementById(subjects + "-test").value) || 0;
        let exam = parseInt(document.getElementById(subjects + "-exam").value) || 0;
        let subjectsTotal = test + exam;
        
        document.getElementById(subjects + "-total").innerText = subjectsTotal;
        document.getElementById(subjects + "-grade").innerText = getGrade(subjectsTotal);
        
        total += subjectsTotal;
    });
    
    
    let average = total / subjects.length;
    let percentage = (total / (subjects.length * 100)) * 100;
    
    document.getElementById("total").innerText = total;
    document.getElementById("average").innerText = average.toFixed(2);
    document.getElementById("percentage").innerText = percentage.toFixed(2) + "%";
}