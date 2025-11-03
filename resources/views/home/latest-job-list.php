<?php
/* include "db.php";

$stmt = $conn->query("SELECT id, title, company, job_category, job_type, wage, job_location FROM jobs ORDER BY created_at DESC LIMIT 5");
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC); */

class Job {
    public $id;
    public $title;
    public $company;
    public $job_category;
    public $job_type;
    public $wage;
    public $job_location;

    public function __construct($id, $title, $company, $job_category, $job_type, $wage, $job_location) {
        $this->id = $id;
        $this->title = $title;
        $this->company = $company;
        $this->job_category = $job_category;
        $this->job_type = $job_type;
        $this->wage = $wage;
        $this->job_location = $job_location;
    }
}

// Create sample job objects
$jobs = [
    new Job(1, "Frontend Developer", "TechNova", "IT", job_type: "Full-time", wage: "$1000/month", job_location: "Hanoi"),
    new Job(2, "Graphic Designer", "Designify", "Design", job_type: "Part-time", wage: "$700/month", job_location: "HCMC"),
    new Job(3, "Marketing Specialist", "BizPro", "Marketing", job_type: "Full-time", wage: "$900/month", job_location: "Da Nang"),
];
?>


<div class="latest-list">
    <?php foreach ($jobs as $job): ?>
        <div class="job-card">
            
            <div class="time-ago-badge">10 min ago</div>
            <div class="job-info-main">
                
                <div class="title-comp">
                    <h3 class="job-title"><?= htmlspecialchars($job->title) ?></h3>
                    <p class="job-company"><?= htmlspecialchars($job->company) ?></p>
                </div>
                <div class="secondary-info">
                    <div class="info-job-summary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 6c.58 0 1.05.2 1.42.59c.38.41.58.86.58 1.41v11c0 .55-.2 1-.58 1.41c-.37.39-.84.59-1.42.59H4c-.58 0-1.05-.2-1.42-.59C2.2 20 2 19.55 2 19V8c0-.55.2-1 .58-1.41C2.95 6.2 3.42 6 4 6h4V4c0-.58.2-1.05.58-1.42C8.95 2.2 9.42 2 10 2h4c.58 0 1.05.2 1.42.58c.38.37.58.84.58 1.42v2zM4 8v11h16V8zm10-2V4h-4v2z"/></svg>
                        <p class="job-category"><?= htmlspecialchars($job->job_category) ?></p>
                    </div>
                    <div class="info-job-summary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 20a7 7 0 0 1-7-7a7 7 0 0 1 7-7a7 7 0 0 1 7 7a7 7 0 0 1-7 7m7.03-12.61l1.42-1.42c-.45-.51-.9-.97-1.41-1.41L17.62 6c-1.55-1.26-3.5-2-5.62-2a9 9 0 0 0-9 9a9 9 0 0 0 9 9c5 0 9-4.03 9-9c0-2.12-.74-4.07-1.97-5.61M11 14h2V8h-2m4-7H9v2h6z"/></svg>
                        <p class="job-type"><?= htmlspecialchars($job->job_type) ?></p>
                    </div>
                    <div class="info-job-summary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.4 21q-2.275 0-3.838-1.562T3 15.6q0-.95.325-1.85t.925-1.625L7.8 7.85L5.375 3h13.25L16.2 7.85l3.55 4.275q.6.725.925 1.625T21 15.6q0 2.275-1.575 3.838T15.6 21zm3.6-5q-.825 0-1.412-.587T10 14t.588-1.412T12 12t1.413.588T14 14t-.587 1.413T12 16M9.625 7h4.75l1-2h-6.75zM8.4 19h7.2q1.425 0 2.413-.987T19 15.6q0-.6-.213-1.162t-.587-1.013L14.525 9H9.5l-3.7 4.4q-.375.45-.587 1.025T5 15.6q0 1.425.988 2.413T8.4 19"/></svg>
                        <p class="job-wage"><?= htmlspecialchars($job->wage) ?></p>
                    </div>
                    <div class="info-job-summary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M16.272 10.272a4 4 0 1 1-8 0a4 4 0 0 1 8 0m-2 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0"/><path d="M5.794 16.518a9 9 0 1 1 12.724-.312l-6.206 6.518zm11.276-1.691l-4.827 5.07l-5.07-4.827a7 7 0 1 1 9.897-.243"/></g></svg>
                        <p class="job-location"><?= htmlspecialchars($job->job_location) ?></p>
                    </div>
                </div>
                
                
            </div>
            <div class="job-right-element">
                    <div class="bookmark-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5 21V5q0-.825.588-1.412T7 3h10q.825 0 1.413.588T19 5v16l-7-3zm2-3.05l5-2.15l5 2.15V5H7zM7 5h10z"/></svg>
                </div>
                <button class="job-details-btn">
                        Job Details
                </button>
                </div>
        </div>
    <?php endforeach ?>
</div>