<?php 
require_once __DIR__ . '/../../config/db.php';

class Job {
    public static function getFilterChoices(){
        global $db;
        $filter_show_query = [];
        $sql = "SELECT category_name, id
        FROM jobcategories ORDER BY id ASC";
        $result = mysqli_query($db, $sql);
        $cat_array = [];
        while ($row = $result->fetch_assoc()){
            $cat_array[] = $row;
        }
        array_push($filter_show_query, $cat_array);
        $sql = "SELECT DISTINCT j.location  FROM jobs j ORDER BY j.location DESC";
        $result = mysqli_query($db, $sql);
        $loc_array = [];
        while ($row = $result->fetch_assoc()){
            $loc_array[] = $row;
        }
        array_push($filter_show_query, $loc_array);

        $sql = "SELECT job_type, COUNT(id) AS JobCount FROM jobs WHERE job_status = 'open' GROUP BY job_type";
        $result = mysqli_query($db, $sql);
        $job_type_array = [];
        while ($row = $result->fetch_assoc()){
            $job_type_array[] = $row;
        }
        /* $sql = "SELECT
        TIMESTAMPDIFF(MINUTE, j.posted_at, NOW()) AS minutes_ago,
                    TIMESTAMPDIFF(HOUR, j.posted_at, NOW()) AS hours_ago,
                    TIMESTAMPDIFF(DAY, j.posted_at, NOW()) AS days_ago
                    FROM jobs j
                    WHERE job_status = 'open'";

        $result = mysqli_query($db, $sql);

        $time_check_arr = [];
        while ($row = $result->fetch_assoc()){
            $time_check_arr[] = $row;
        }*/
        array_push($filter_show_query, $job_type_array); 

        return $filter_show_query;
    }
    public static function getFilteredJobs($filters, $isDescending = true) {
        global $db;

        $sql = "
        SELECT
            j.id, j.title, j.location, j.salary, j.job_type, j.posted_at,
            c.category_name, e.company_name, e.logo,
            TIMESTAMPDIFF(MINUTE, j.posted_at, NOW()) AS minutes_ago,
            TIMESTAMPDIFF(HOUR, j.posted_at, NOW()) AS hours_ago,
            TIMESTAMPDIFF(DAY, j.posted_at, NOW()) AS days_ago
        FROM jobs j
        JOIN JobCategories c ON j.category_id = c.id
        JOIN Employers e ON j.employer_id = e.id
        WHERE 1=1
        ";

        $params = [];

        // Location filter
        if (!empty($filters['location'])) {
            $sql .= " AND j.location = ?";
            $params[] = ucwords(str_replace('-', ' ', $filters['location']));
        }

        // Category filter
        if (!empty($filters['category'])) {
            $placeholders = implode(',', array_fill(0, count($filters['category']), '?'));
            $sql .= " AND j.category_id IN ($placeholders)";
            $params = array_merge($params, $filters['category']);
        }

        // Type filter
        if (!empty($filters['type'])) {
            $placeholders = implode(',', array_fill(0, count($filters['type']), '?'));
            $sql .= " AND j.job_type IN ($placeholders)";
            $params = array_merge($params, $filters['type']);
        }

        // Posted at filter
        if (!empty($filters['posted_at'])) {
            $sql .= " AND j.posted_at = ?";
            $params[] = $filters['posted_at'];
        }

        // Salary filter
        if (!empty($filters['max_salary'])) {
            $sql .= " AND j.salary <= ?";
            $params[] = $filters['max_salary'];
        }

        $sql .= " ORDER BY j.posted_at DESC";

        $stmt = mysqli_prepare($db, $sql);

        if ($stmt && !empty($params)) {
            $typesStr = str_repeat('s', count($params));
            mysqli_stmt_bind_param($stmt, $typesStr, ...$params);
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);
        mysqli_close($db);

        if (!$isDescending) {
            $jobs = array_reverse($jobs);
        }

        return $jobs;
    }

    public static function JobSpecific($id) {
        global $db;

        $sql = "
        SELECT 
            j.title,
            j.location,
            j.description,
            j.requirements,
            j.job_type,
            j.min_experience_years,
            j.min_degree,
            j.salary,
            j.deadline,
            c.category_name,
            e.company_name, e.logo,
            TIMESTAMPDIFF(MINUTE, j.posted_at, NOW()) AS minutes_ago,
            TIMESTAMPDIFF(HOUR, j.posted_at, NOW()) AS hours_ago,
            TIMESTAMPDIFF(DAY, j.posted_at, NOW()) AS days_ago
        FROM Jobs j
        JOIN JobCategories c ON j.category_id = c.id
        JOIN Employers e ON j.employer_id = e.id
        WHERE j.id = ?
    ";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $job_specific = $result->fetch_assoc();
        } else {
            echo "<p>No job found with this ID.</p>";
            exit;
        }

        return $job_specific;
    }
}