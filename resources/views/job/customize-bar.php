<?php
/* 
require __DIR__ . '/../../../config/db.php';


$sql = "SELECT category_name, id
        FROM jobcategories ORDER BY id ASC";
$result = mysqli_query($db, $sql);
$cat_array = [];
while ($row = $result->fetch_assoc()){
    $cat_array[] = $row;
}

$sql = "SELECT DISTINCT j.location  FROM jobs j ORDER BY j.location DESC";
$result = mysqli_query($db, $sql);
$loc_array = [];
while ($row = $result->fetch_assoc()){
    $loc_array[] = $row;
}

    $sql = "SELECT
    TIMESTAMPDIFF(MINUTE, j.posted_at, NOW()) AS minutes_ago,
                TIMESTAMPDIFF(HOUR, j.posted_at, NOW()) AS hours_ago,
                TIMESTAMPDIFF(DAY, j.posted_at, NOW()) AS days_ago
                FROM jobs j
                WHERE job_status = 'open'";

    $result = mysqli_query($db, $sql);

    $time_check_arr = [];
    while ($row = $result->fetch_assoc()){
        $time_check_arr[] = $row;
    }

   #  print_r($time_check_arr);

mysqli_free_result($result);
    mysqli_close($db);
 */
?>


<form method="GET" id="filter-bar">
    <input type="hidden" name="page" value="job">
    <input type="hidden" name="page-order" value="1">
    <input type="hidden" name="sort" value="desc">
    <div class="filter-section location-filter">
        <h3>Location</h3>
        <div class="select-wrapper">
            <select name="location" aria-label="Choose city for job search">
                <option value="" disabled selected>

                    Choose city
                </option>
                <?php foreach ($loc_array as $loc):?>
                    <option value=<?php echo str_replace(' ', '-', strtolower($loc['location'])) ?>>
                    <?php echo $loc['location'] ?>
                    </option>
                <?php endforeach ?>
                
                </select>
            </div>
    </div>

    <div class="filter-section category-filter">
        <h3>Category</h3>
        <div class="radio-group">
            <?php foreach ($cat_array as $i => $cat): ?>
                <label class="<?php echo $i >= 5 ? 'hidden-extra' : '' ?>">
                    <input type="checkbox" name="category[]" value="<?= $cat['id'] ?>">
                    <?php echo $cat["category_name"] ?>
                    
                </label>
            <?php endforeach ?>
        </div>
        <button type="button" class="show-more-btn" id="show-more">Show More</button>
    </div>

    <div class="filter-section job-type-filter">
        <h3>Job Type</h3>
        <div class="radio-group">
            <?php foreach($job_type_array as $type):?>
            <label>
                <input type="checkbox" name="job-type[]" value="<?= strtolower($type["job_type"]) ?>">
                <?= $type["job_type"]?>
            </label>
            <?php endforeach ?>
        </div>
    </div>

    <div class="filter-section date-posted-filter">
        <h3>Date Posted</h3>
        <div class="radio-group">
            <label>
                <input type="radio" name="date-posted" value="all">
                All
            </label>
            <label>
                <input type="radio" name="date-posted" value="last-hour">
                Last Hour
            </label>
            
            <label>
                <input type="radio" name="date-posted" value="last-24-hours">
                Last 24 Hours
                
            </label>
            
            <label>
                <input type="radio" name="date-posted" value="last-7-days">
                Last 7 Days
                
            </label>
           
            <label>
                <input type="radio" name="date-posted" value="last-30-days">
                Last 30 Days
                
            </label>
        </div>
    </div>

    <div class="filter-section salary-filter">
        <h3>Salary</h3>
        <div class="range-slider-container">
            <input type="range" name="max-salary" min="0" max="10000" value="5000" class="salary-range-slider">
        </div>
        <div class="salary-display">
            <p id="salary-display-text">Salary: <span class="salary-min-max">$0 - $10000</span></p>
            
        </div>
        <button type="submit" class="apply-btn">Apply</button>
    </div>
</form>

<?php ?>