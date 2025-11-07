<?php
// controllers/JobController.php
require_once __DIR__ . '/../models/Job.php';

class JobController {
    public function index() {
        $filter_choices = Job::getFilterChoices();

        $cat_array = $filter_choices[0];
        $loc_array = $filter_choices[1];
        $job_type_array = $filter_choices[2];

        // 1️⃣ Lấy input từ query string
        $filters = [
            'location'   => $_GET['location'] ?? '',
            'category'   => $_GET['category'] ?? [],
            'type'       => $_GET['job-type'] ?? [],
            'posted_at'  => $_GET['date_posted'] ?? '',
            'max_salary' => $_GET['max-salary'] ?? '',
        ];
        // print_r($filters);
        $isDescending = !(isset($_GET['sort']) && $_GET['sort'] === 'asc');

        // 2️⃣ Gọi Model để lấy danh sách job
        $jobs = Job::getFilteredJobs($filters, $isDescending);

        // 3️⃣ Phân trang
        $page = isset($_GET['page-order']) ? (int)$_GET['page-order'] : 1;
        $page_offset = 10;
        $total_jobs = count($jobs);
        $prev_page_max = ($page - 1) * $page_offset;
        $page_max = min($prev_page_max + $page_offset, $total_jobs);
        $show_statement = "Show " . ($prev_page_max + 1) . "-$page_max of $total_jobs";

        $jobs_to_display = array_slice($jobs, $prev_page_max, $page_offset);

        $viewData = [
            'cat_array' => $cat_array,
            'loc_array' => $loc_array,
            'job_type_array' => $job_type_array,
            'jobs_to_display' => $jobs_to_display,
            'show_statement' => $show_statement,
            'isDescending' => $isDescending,
            'page' => $page,
            'page_max' => $page_max,
            'total_jobs' => $total_jobs
        ];
        /* extract($viewData); */
        
        return $viewData;

        // 4️⃣ Gửi dữ liệu cho View
        //include __DIR__ . '/../../resources/views/job/list-job.php';
    }

    public function getJobSpecific() {
        $job_id = intval($_GET['jid']);
        $job_specific = Job::JobSpecific($job_id);

        $viewData = [
            'job_specific' => $job_specific
        ];

        return $viewData;
    }
}
