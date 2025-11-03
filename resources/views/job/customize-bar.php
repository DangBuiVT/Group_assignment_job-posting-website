<?php
$locs = [
    [
        "name" => "Ho Chi Minh City", 
        "slug" => "ho-chi-minh-city" 
    ],
    [
        "name" => "Ha Noi", 
        "slug" => "ha-noi" 
    ],
    [
        "name" => "Hai Phong", 
        "slug" => "hai-phong" 
    ],
    [
        "name" => "Da Nang", 
        "slug" => "da-nang" 
    ],
    [
        "name" => "Can Tho", 
        "slug" => "can-tho" 
    ],
    [
        "name" => "Hue", 
        "slug" => "hue" 
    ],
];
$cats = [
    [
        'name' => 'Information Technology',
        'jobs_available' => 3250,
        'slug' => 'information-technology'
    ],
    [
        'name' => 'Healthcare',
        'jobs_available' => 2810,
        'slug' => 'healthcare'
    ],
    [
        'name' => 'Sales and Marketing',
        'jobs_available' => 1975,
        'slug' => 'sales-marketing'
    ],
    [
        'name' => 'Finance and Accounting',
        'jobs_available' => 1520,
        'slug' => 'finance-accounting'
    ],
    [
        'name' => 'Education and Training',
        'jobs_available' => 1100,
        'slug' => 'education-training'
    ],
    [
        'name' => 'Engineering and Architecture',
        'jobs_available' => 1650,
        'slug' => 'engineering-architecture'
    ],
    [
        'name' => 'Administration and Office Support',
        'jobs_available' => 1400,
        'slug' => 'administration-support'
    ],
    [
        'name' => 'Human Resources',
        'jobs_available' => 780,
        'slug' => 'human-resources'
    ],
    [
        'name' => 'Art, Media, and Design',
        'jobs_available' => 630,
        'slug' => 'art-media-design'
    ],
    [
        'name' => 'Science and Research',
        'jobs_available' => 890,
        'slug' => 'science-research'
    ],
    [
        'name' => 'Legal',
        'jobs_available' => 450,
        'slug' => 'legal'
    ],
    [
        'name' => 'Manufacturing and Production',
        'jobs_available' => 1350,
        'slug' => 'manufacturing-production'
    ],
    [
        'name' => 'Transportation and Logistics',
        'jobs_available' => 1700,
        'slug' => 'transportation-logistics'
    ],
    [
        'name' => 'Customer Service',
        'jobs_available' => 1550,
        'slug' => 'customer-service'
    ],
    [
        'name' => 'Food Services and Hospitality',
        'jobs_available' => 980,
        'slug' => 'food-hospitality'
    ],
    [
        'name' => 'Construction and Trades',
        'jobs_available' => 1850,
        'slug' => 'construction-trades'
    ]
];

?>


<div class="customize-bar">
    <div class="filter-section location-filter">
        <h3>Location</h3>
        <div class="select-wrapper">
            <select aria-label="Choose city for job search">
                <option value="" disabled selected>

                    Choose city
                </option>
                <?php foreach ($locs as $loc):?>
                    <option value=<?php echo $loc['slug'] ?>>
                    <?php echo $loc['name'] ?>
                    </option>
                <?php endforeach ?>
                
                </select>
            </div>
    </div>

    <div class="filter-section category-filter">
        <h3>Category</h3>
        <div class="radio-group">
            <?php foreach ($cats as $i => $cat) { ?>
                <label class="<?php echo $i >= 5 ? 'hidden-extra' : '' ?>">
                    <input type="checkbox" name="category" value="<?php echo str_replace(' ', '-', strtolower($cat['slug'])) ?>">
                    <?php echo $cat['name'] ?>
                    <span class="job-count"><?php echo $cat['jobs_available'] ?></span>
                </label>
            <?php } ?>
        </div>
        <button class="show-more-btn" id="show-more">Show More</button>
    </div>

    <div class="filter-section job-type-filter">
        <h3>Job Type</h3>
        <div class="radio-group">
            <label>
                <input type="radio" name="job-type" value="full-time">
                Full Time
                <span class="job-count">10</span>
            </label>
            <label>
                <input type="radio" name="job-type" value="part-time">
                Part Time
                <span class="job-count">10</span>
            </label>
            <label>
                <input type="radio" name="job-type" value="freelance">
                Freelance
                <span class="job-count">10</span>
            </label>
            <label>
                <input type="radio" name="job-type" value="seasonal">
                Seasonal
                <span class="job-count">10</span>
            </label>
            <label>
                <input type="radio" name="job-type" value="fixed-price">
                Fixed-Price
                <span class="job-count">10</span>
            </label>
        </div>
    </div>

    <div class="filter-section date-posted-filter">
        <h3>Date Posted</h3>
        <div class="radio-group">
            <label>
                <input type="radio" name="date-posted" value="all">
                All
                <span class="job-count">10</span>
            </label>
            <label>
                <input type="radio" name="date-posted" value="last-hour">
                Last Hour
                <span class="job-count">10</span>
            </label>
            <label>
                <input type="radio" name="date-posted" value="last-24-hours">
                Last 24 Hours
                <span class="job-count">10</span>
            </label>
            <label>
                <input type="radio" name="date-posted" value="last-7-days">
                Last 7 Days
                <span class="job-count">10</span>
            </label>
            <label>
                <input type="radio" name="date-posted" value="last-30-days">
                Last 30 Days
                <span class="job-count">10</span>
            </label>
        </div>
    </div>

    <div class="filter-section salary-filter">
        <h3>Salary</h3>
        <div class="range-slider-container">
            <input type="range" min="0" max="100" value="50" class="salary-range-slider">
        </div>
        <div class="salary-display">
            <p id="salary-display-text">Salary: <span class="salary-min-max">$0 - $10000</span></p>
            
        </div>
        <button class="apply-btn">Apply</button>
    </div>
</div>