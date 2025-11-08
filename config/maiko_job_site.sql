-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2025 at 07:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maiko_job_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `user_id`, `company_name`, `logo`, `website`, `contact_info`, `description`) VALUES
(1, 1, 'TechCorp Solutions', 'techcorp_logo.png', 'https://techcorp.com', 'contact@techcorp.com', 'A leading web and mobile app development company.'),
(2, 2, 'Creatix Studio', 'creatix_logo.png', 'https://creatix.vn', 'hello@creatix.vn', 'Creative design and marketing agency in Vietnam.'),
(3, 3, 'FinTrust Consulting', 'fintrust_logo.png', 'https://fintrust.com', 'info@fintrust.com', 'Finance and accounting services provider.');

-- --------------------------------------------------------

--
-- Table structure for table `jobcategories`
--

CREATE TABLE `jobcategories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobcategories`
--

INSERT INTO `jobcategories` (`id`, `category_name`) VALUES
(2, 'Design & Creative'),
(5, 'Education & Training'),
(4, 'Finance & Accounting'),
(3, 'Marketing & Communications'),
(1, 'Software Development');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `location` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `job_type` enum('Full-time','Part-time','Freelance') DEFAULT NULL,
  `min_experience_years` tinyint(3) UNSIGNED DEFAULT NULL,
  `min_degree` enum('None','High School','Associate','Bachelor','Master','PhD') DEFAULT 'None',
  `salary` decimal(10,0) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `job_status` enum('open','closed','paused') DEFAULT 'open',
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `employer_id`, `category_id`, `title`, `location`, `description`, `requirements`, `job_type`, `min_experience_years`, `min_degree`, `salary`, `deadline`, `job_status`, `posted_at`) VALUES
(1, 1, 1, 'Junior Web Developer', 'Hanoi', 'Assist in front-end development using HTML, CSS, JS.', 'Basic understanding of HTML/CSS/JS.', 'Full-time', 3, 'Bachelor', 800, '2025-12-31', 'open', '2025-11-05 05:19:30'),
(2, 1, 1, 'Backend Developer', 'Ho Chi Minh City', 'Develop RESTful APIs and maintain databases.', 'Experience with Node.js or PHP preferred.', 'Full-time', 5, 'Master', 1200, '2025-12-15', 'open', '2025-11-05 05:19:30'),
(3, 2, 2, 'Graphic Designer', 'Da Nang', 'Create marketing visuals and UI layouts.', 'Proficient in Adobe Photoshop & Illustrator.', 'Full-time', 0, 'None', 1000, '2025-12-10', 'open', '2025-11-05 05:19:30'),
(4, 2, 2, 'UX/UI Designer', 'Remote', 'Design user interfaces for mobile apps.', 'Portfolio demonstrating design thinking.', 'Full-time', 2, 'Associate', 1300, '2025-12-25', 'open', '2025-11-05 05:19:30'),
(5, 3, 3, 'Digital Marketing Specialist', 'Hanoi', 'Manage SEO/SEM and social media ads.', 'Knowledge of Google Ads, SEO tools.', 'Full-time', 7, 'PhD', 1100, '2025-12-20', 'open', '2025-11-05 05:19:30'),
(6, 3, 3, 'Content Writer', 'Remote', 'Write engaging content for company blog.', 'Strong writing and research skills.', 'Full-time', 1, 'High School', 700, '2025-12-05', 'open', '2025-11-05 05:19:30'),
(7, 1, 1, 'Full-Stack Developer', 'Ho Chi Minh City', 'Build full-stack web applications.', 'Experience in React and Node.js.', 'Full-time', 4, 'Bachelor', 1500, '2026-01-10', 'open', '2025-11-05 05:19:30'),
(8, 2, 4, 'Accountant', 'Hanoi', 'Prepare monthly financial reports.', 'Degree in Accounting or Finance.', 'Full-time', 6, 'Master', 1000, '2025-12-30', 'open', '2025-11-05 05:19:30'),
(9, 3, 4, 'Financial Analyst', 'Ho Chi Minh City', 'Analyze company financial performance.', 'Experience with Excel & data modeling.', 'Full-time', 0, 'None', 1400, '2025-12-18', 'open', '2025-11-05 05:19:30'),
(10, 1, 5, 'English Teacher', 'Da Nang', 'Teach English to children aged 8–12.', 'Bachelor in Education, fluent English.', 'Part-time', 3, 'Associate', 900, '2025-12-28', 'open', '2025-11-05 05:19:30'),
(11, 2, 5, 'Math Tutor', 'Remote', 'Provide online tutoring sessions for high school students.', 'Good math skills and teaching ability.', 'Part-time', 8, 'PhD', 800, '2026-01-05', 'open', '2025-11-05 05:19:30'),
(12, 1, 2, 'Video Editor', 'Hanoi', 'Edit marketing and product videos.', 'Experience with Premiere Pro or DaVinci.', 'Freelance', 1, 'High School', 950, '2025-12-22', 'open', '2025-11-05 05:19:30'),
(13, 2, 3, 'Social Media Manager', 'Ho Chi Minh City', 'Manage social media accounts & campaigns.', 'Strong sense of trends & analytics.', 'Part-time', 5, 'Bachelor', 1150, '2025-12-14', 'open', '2025-11-05 05:19:30'),
(14, 3, 1, 'DevOps Engineer', 'Remote', 'Automate deployment pipelines.', 'Experience with Docker and CI/CD tools.', 'Full-time', 2, 'Master', 1600, '2026-01-15', 'open', '2025-11-05 05:19:30'),
(15, 2, 4, 'Payroll Specialist', 'Hanoi', 'Handle payroll and employee benefits.', 'Knowledge of HR systems.', 'Full-time', 0, 'None', 1050, '2025-12-29', 'open', '2025-11-05 05:19:30'),
(16, 1, 3, 'SEO Specialist', 'Da Nang', 'Optimize website for better search ranking.', 'Understanding of Google Analytics.', 'Full-time', 4, 'Associate', 1000, '2025-12-17', 'open', '2025-11-05 05:19:30'),
(17, 3, 5, 'STEM Instructor', 'Ho Chi Minh City', 'Teach robotics and programming to kids.', 'Experience with Arduino or Scratch.', 'Full-time', 6, 'PhD', 950, '2026-01-03', 'open', '2025-11-05 05:19:30'),
(18, 1, 1, 'Mobile App Developer', 'Remote', 'Develop Android and iOS applications.', 'Experience with Flutter or React Native.', 'Full-time', 1, 'High School', 1400, '2026-01-12', 'open', '2025-11-05 05:19:30'),
(19, 2, 2, 'Illustrator', 'Hanoi', 'Create digital illustrations for branding.', 'Strong drawing and vector skills.', 'Full-time', 3, 'Bachelor', 900, '2025-12-21', 'open', '2025-11-05 05:19:30'),
(20, 3, 4, 'Tax Consultant', 'Ho Chi Minh City', 'Advise clients on tax compliance.', 'CPA or equivalent certification.', 'Full-time', 5, 'Master', 1600, '2025-12-19', 'open', '2025-11-05 05:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `staffactions`
--

CREATE TABLE `staffactions` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `action_type` enum('approve','reject','review','delete') NOT NULL,
  `action_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','staff','employer','applicant') NOT NULL DEFAULT 'applicant',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `role`, `created_at`) VALUES
(1, 'Alice Nguyen', 'alice@techcorp.com', 'hashed_pw_1', 'employer', '2025-11-05 05:19:30'),
(2, 'Brian Tran', 'brian@creatix.vn', 'hashed_pw_2', 'employer', '2025-11-05 05:19:30'),
(3, 'Cathy Le', 'cathy@fintrust.com', 'hashed_pw_3', 'employer', '2025-11-05 05:19:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jobcategories`
--
ALTER TABLE `jobcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_id` (`employer_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `staffactions`
--
ALTER TABLE `staffactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobcategories`
--
ALTER TABLE `jobcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staffactions`
--
ALTER TABLE `staffactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `employers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `jobcategories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `staffactions`
--
ALTER TABLE `staffactions`
  ADD CONSTRAINT `staffactions_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staffactions_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
