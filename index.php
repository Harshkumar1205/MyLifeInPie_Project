<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>My Life in a Pie</title>
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container">
    <h1>My Life in a Pie</h1>
    <form id="lifeForm" method="post" action="save.php">
      <label>Sleep (hrs): <input type="number" name="sleep" min="0" max="24" required /></label>
      <label>Work (hrs): <input type="number" name="work" min="0" max="24" required /></label>
      <label>Entertainment (hrs): <input type="number" name="entertainment" min="0" max="24" required /></label>
      <label>Study (hrs): <input type="number" name="study" min="0" max="24" required /></label>
      <label>Family Time (hrs): <input type="number" name="family" min="0" max="24" required /></label>
      <button type="submit">Save & View Chart</button>
    </form>

    <canvas id="lifeChart"></canvas>

    <!-- Download button hidden initially -->
    <button id="downloadBtn" style="display:none; margin-top:10px;">Download Chart as Image</button>
  </div>

  <script src="script.js"></script>
</body>
</html>
