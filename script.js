const downloadBtn = document.getElementById('downloadBtn');

document.getElementById('lifeForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    const sleep = parseInt(formData.get('sleep'));
    const work = parseInt(formData.get('work'));
    const entertainment = parseInt(formData.get('entertainment'));
    const study = parseInt(formData.get('study'));
    const family = parseInt(formData.get('family'));

    const chartData = {
        labels: ['Sleep', 'Work', 'Entertainment', 'Study', 'Family Time'],
        datasets: [{
            label: 'Hours Spent',
            data: [sleep, work, entertainment, study, family],
            backgroundColor: [
                '#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0', '#9966ff'
            ]
        }]
    };

    const ctx = document.getElementById('lifeChart').getContext('2d');
    if (window.myPieChart) window.myPieChart.destroy();
    window.myPieChart = new Chart(ctx, {
        type: 'pie',
        data: chartData,
        options: { responsive: true }
    });

    // Show download button
    downloadBtn.style.display = 'inline-block';

    // Save data to PHP
    fetch('save.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => console.log(data))
        .catch(err => console.error(err));
});

// Download image on button click
downloadBtn.addEventListener('click', function() {
    const link = document.createElement('a');
    link.download = 'MyLifePieChart.png';
    link.href = document.getElementById('lifeChart').toDataURL('image/png');
    link.click();
});