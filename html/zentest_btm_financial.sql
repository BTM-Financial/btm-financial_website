-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2022 at 05:12 PM
-- Server version: 8.0.27
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zentest_btm_financial`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `image` text,
  `status` tinyint DEFAULT NULL COMMENT '1=Active,0=Inactive',
  `login_ip` varchar(50) DEFAULT NULL,
  `login_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `mobile`, `type`, `image`, `status`, `login_ip`, `login_date`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad', NULL, 'Administrative', NULL, 1, '132.154.103.157', '2022-01-13 11:30:42', '2021-05-18 11:19:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` text,
  `heading` text,
  `slug` text,
  `status` tinyint DEFAULT '0' COMMENT '1=Active,0=Inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `heading`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Intelligent Data, Analytics & AI Solutions', '1631860371-inteligent.png', 'Unlock the power of your data', NULL, 1, '2021-09-17 12:02:52', NULL),
(2, 'Sculpt your Thoughts to Reality', '1631860422-sculpt.png', 'Ideate, Innovate and Implement', NULL, 1, '2021-09-17 12:03:42', NULL),
(3, 'Cutting-edge Digital Transformation', '1631860477-cutter-edge.png', 'Company to streamline your business forward!', NULL, 1, '2021-09-17 12:04:38', '2021-09-17 12:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int NOT NULL,
  `title` text,
  `location` varchar(255) DEFAULT NULL,
  `experienced` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `short_desc` text,
  `role_responsibility` longtext,
  `qualifications` longtext,
  `slug` text,
  `status` tinyint NOT NULL DEFAULT '1',
  `deleted` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `location`, `experienced`, `job_type`, `short_desc`, `role_responsibility`, `qualifications`, `slug`, `status`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Sr. Python Developer', 'Gurugram, Haryana (work from home until the situation resolves).', '4 to 7 years', 'Full Time', 'BTM Financial: BTM Financial, LLC is a M.B.E designated boutique analytical firm offering unique knowledge-based services to clients in financial services and related businesses. With in-depth knowledge of the Derivative market, Fixed Income Analytics and Asset-Backed-Security (ABS) markets, BTM\'s teams deliver expertly crafted analytics solutions with regards to quant models, Regression Analysis, application development, data management and support. We provide tools that enable clients to make smart, informed, and effective decisions with customization and flexibility being our hallmarks.\r\n\r\nPlease visit https://btm-financial.com/ more details about us.', '<ul>\r\n<li>Participating in the technical design and creation of scalable software.</li>\r\n<li>Testing and fixing bugs or other coding issues.</li>\r\n<li>Individual contributor for writing python rest api/web application.</li>\r\n<li>Strong unit test and debugging skills.</li>\r\n<li>Understanding of the threading limitations of Python, and multi-process architecture.</li>\r\n<li>Demonstrates familiarity and strong working knowledge of the python programming languages and tools for the application area.</li>\r\n<li>Maintaining strong working knowledge of data science and analytics field.</li>\r\n<li>Experience in a software development position including all aspects of the Software Development Life Cycle (SDLC); including requirements definition, technical designs, coding, testing and implementation and integration.</li>\r\n<li>Selects appropriate work procedures or approaches to address technical challenges, consistent with appropriate standards and policies.</li>\r\n</ul>', '<ul>\r\n<li>The candidate should have knowledge of algorithms, data structures, API usage, and creating long-lasting reusable code.</li>\r\n<li>Capability to develop RESTful APIs and Web Applications in Python.</li>\r\n<li>Capability in Django/Flask framework.</li>\r\n<li>Good understanding of various data file format like xml, json, csv etc..</li>\r\n<li>Ability to build high-performance APIs.</li>\r\n<li>Strong python development background is must. Skill in general purpose programming languages such as Java, Dot Net, JavaScript, C/C++ or similar is preferred.</li>\r\n<li>Full grasp of Data Structures/ Algorithms.</li>\r\n<li>Ability and interest to learn other coding languages as needed.</li>\r\n<li>Experience working with teams across different time-zones and countries.</li>\r\n<li>Experience in Core Python and various libraries.</li>\r\n</ul>', 'sr-python-developer', 1, 0, '2021-09-16 14:02:46', '2021-09-16 14:06:14'),
(2, 'Business Analyst', 'Gurugram, Haryana (work from home until the situation resolves).', '1 to 3 years', 'Full Time', 'BTM Financial: BTM Financial, LLC is a M.B.E designated boutique analytical firm offering unique knowledge-based services to clients in financial services and related businesses. With in-depth knowledge of the Derivative market, Fixed Income Analytics and Asset-Backed-Security (ABS) markets, BTM\'s teams deliver expertly crafted analytics solutions in regard to quant models, Regression Analysis, application development, data management and support. We provide tools that enable clients to make smart, informed, and effective decisions with customization and flexibility being our hallmarks. Please visit https://btm-financial.com/ for more details about us.', '<ul>\r\n<li>To work with organisation to help in improving processes and systems.</li>\r\n<li>Conduct research and analysis to come up with solutions to business problems and help to introduce these systems to businesses and their clients.</li>\r\n<li>Demonstrates familiarity and strong working knowledge of the VBA programming language and Excel tools and functions.</li>\r\n<li>Builds and maintains strong working knowledge of data analytics field.</li>\r\n<li>Participates in technical design, contributing insights and ideas.</li>\r\n<li>Selects appropriate work procedures or approaches to address technical challenges, consistent with appropriate standards and policies.</li>\r\n<li>Communicate with senior people in organisations and their clients to find out what they hope to achieve.</li>\r\n<li>Persuade internal and external stakeholders of the benefits of new technology or strategies.</li>\r\n<li>Oversee the implementation of new technology and systems.</li>\r\n<li>Run workshops and training sessions.</li>\r\n<li>Performing requirements analysis.</li>\r\n<li>Documenting and communicating the results of team&rsquo;s efforts.</li>\r\n<li>Updating, implementing, and maintaining procedures.</li>\r\n<li>Monitoring deliverables and ensuring timely completion of projects.</li>\r\n</ul>', '<ul>\r\n<li>Sound skill in VBA programming languages with functions and data handling logics.</li>\r\n<li>Sound working knowledge of MS Excel functions and Power point.</li>\r\n<li>Good hands on experience on Data &amp; Quant analytics, data science, regression models etc.</li>\r\n<li>Full grasp of Data Structures/ Algorithms.</li>\r\n<li>Ability and interest to learn other scripting languages as needed.</li>\r\n<li>Experience working with teams across different time-zones and countries.</li>\r\n<li>Strong documentation and communication skills.</li>\r\n<li>Knowledge of Fixed Income and Structured Finance is preferred.</li>\r\n</ul>', 'business-analyst', 1, 0, '2021-09-20 11:29:48', NULL),
(3, 'Sr. Business Analyst', 'Gurugram, Haryana (work from home until the situation resolves).', '2 to 6 years', 'Full Time', 'BTM Financial: BTM Financial, LLC is a M.B.E designated boutique analytical firm offering unique knowledge-based services to clients in financial services and related businesses. With in-depth knowledge of the Derivative market, Fixed Income Analytics and Asset-Backed-Security (ABS) markets, BTM\'s teams deliver expertly crafted analytics solutions in regard to quant models, Regression Analysis, application development, data management and support. We provide tools that enable clients to make smart, informed, and effective decisions with customization and flexibility being our hallmarks. Please visit https://btm-financial.com/ for more details about us.', '<ul>\r\n<li>To work with organisation to help in improving processes and systems.</li>\r\n<li>Conduct research and analysis to come up with solutions to business problems and help to introduce these systems to businesses and their clients.</li>\r\n<li>Demonstrates familiarity and strong working knowledge of the VBA programming language and Excel tools and functions.</li>\r\n<li>Builds and maintains strong working knowledge of data analytics field.</li>\r\n<li>Participates in technical design, contributing insights and ideas.</li>\r\n<li>Selects appropriate work procedures or approaches to address technical challenges, consistent with appropriate standards and policies.</li>\r\n<li>Communicate with senior people in organisations and their clients to find out what they hope to achieve.</li>\r\n<li>Persuade internal and external stakeholders of the benefits of new technology or strategies.</li>\r\n<li>Oversee the implementation of new technology and systems.</li>\r\n<li>Run workshops and training sessions.</li>\r\n<li>Performing requirements analysis.</li>\r\n<li>Documenting and communicating the results of team&rsquo;s efforts.</li>\r\n<li>Updating, implementing, and maintaining procedures.</li>\r\n<li>Monitoring deliverables and ensuring timely completion of projects.</li>\r\n</ul>', '<ul>\r\n<li>Sound skill in VBA programming languages with functions and data handling logics.</li>\r\n<li>Sound working knowledge of MS Excel functions and Power point.</li>\r\n<li>Good hands on experience on Data &amp; Quant analytics, data science, regression models etc.</li>\r\n<li>Full grasp of Data Structures/ Algorithms.</li>\r\n<li>Ability and interest to learn other scripting languages as needed.</li>\r\n<li>Experience working with teams across different time-zones and countries.</li>\r\n<li>Strong documentation and communication skills.</li>\r\n<li>Knowledge of Fixed Income and Structured Finance is preferred.</li>\r\n</ul>', 'sr-business-analyst', 1, 0, '2021-09-20 11:32:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `career_queries`
--

CREATE TABLE `career_queries` (
  `id` int NOT NULL,
  `career_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `resume` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career_queries`
--

INSERT INTO `career_queries` (`id`, `career_id`, `name`, `email`, `phone`, `location`, `resume`, `created_at`) VALUES
(1, 1, 'Masih Haider', 'masi@zenwebnet.com', '7290803902', 'Noida', '1631793150-Chrysanthemum.jpg', '2021-09-16 17:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_desc` longtext,
  `image` text,
  `slug` text,
  `status` tinyint DEFAULT '0' COMMENT '1=Active,0=Inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `title`, `short_desc`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Commercial and Investment Banks', '<p>BTM Financial provides comprehensive bespoke solutions to Commercial &amp; Investment Banks combining cutting-edge Analytical Solutions with Technology.</p>\r\n<ul>\r\n<li>Bond Analytics &amp; Deal Structuring</li>\r\n<li>Corporate Finance Valuation</li>\r\n<li>Data Mining &amp; Cleansing</li>\r\n<li>Credit &amp; Equity Research</li>\r\n<li>Operating models, DCF models, LBO models, merger models.</li>\r\n<li>Relative valuation models</li>\r\n</ul>', '1632118264-commercial.jpg', 'commercial-and-investment-banks', 1, '2021-09-14 14:33:30', '2021-09-20 11:53:11'),
(2, 'Asset Management Companies', '<p>In today&rsquo;s complex marketplace, even sophisticated investors are challenged to stay current and to respond to rapidly changing conditions. Our customized Asset Management Software supports you in several ways which include improving operational efficiency, achieving economy of scale, and controlling running costs.</p>\r\n<ul>\r\n<li>Asset Summary Reports</li>\r\n<li>Developing a Strategic Asset Management Plan</li>\r\n<li>Performance Attribution Analysis</li>\r\n<li>Data Processing &amp; Tabulation</li>\r\n</ul>', '1632118237-asset.jpg', 'asset-management-companies', 1, '2021-09-14 14:34:28', '2021-09-20 11:40:37'),
(3, 'Accounting Firms', '<p>We assist Accounting Firms with advanced Analytics of Data, Regulatory Solutions, Income statement, and statement of cash flows.</p>\r\n<ul>\r\n<li>Financial Statement Analysis</li>\r\n<li>Advanced Business Intelligence Solutions</li>\r\n<li>CCAR, FRTB, BASAL Regulations and Reporting</li>\r\n<li>Back Office Support</li>\r\n</ul>', '1632118320-real.jpg', 'accounting-firms', 1, '2021-09-14 14:35:18', '2021-09-20 11:42:22'),
(4, 'Special Servicers', '<p>We provide tailored Collateral Management services for assets including risk management, surveillance, and reporting. We are focused on creative and efficient solutions for our partners.</p>\r\n<ul>\r\n<li>SS Fee Projection</li>\r\n<li>Asset Surveillance &amp; Reporting</li>\r\n<li>Collateral Management Solutions</li>\r\n<li>Risk Management Support</li>\r\n<li>Loan Analysis &amp; Performance Management</li>\r\n</ul>', '1632118363-special.jpg', 'special-servicers', 1, '2021-09-14 14:35:45', '2021-09-20 11:42:43'),
(5, 'Private Equity & Venture Capital Firms', '<p>BTM Financial provides end to end Fund Management support to Venture Capital Funds as well as Private Equity Firms</p>\r\n<ul>\r\n<li>Due Diligence &amp; Data Integration</li>\r\n<li>Software solutions for Portfolio Management</li>\r\n<li>Investment Compliance</li>\r\n<li>Capital Market Technology Solutions</li>\r\n</ul>', '1632118401-private.jpg', 'private-equity-venture-capital-firms', 1, '2021-09-14 16:28:12', '2021-09-20 11:43:21'),
(6, 'Hedge Funds', '<p>We are a dedicated hedge fund solutions provider, have been evaluating and analyzing for many years.</p>\r\n<ul>\r\n<li>Analytics &amp; Trading Support</li>\r\n<li>Cash Flow Analysis</li>\r\n<li>Sensitivity Analysis</li>\r\n<li>Deal Structuring</li>\r\n<li>Investor Management &amp; Periodic Reporting</li>\r\n</ul>', '1632118449-hedge.jpg', 'hedge-funds', 1, '2021-09-14 16:29:04', '2021-09-20 11:44:09'),
(7, 'Insurance Companies', '<p>BTM Financial provides bespoke Insurance Analytics Services, working alongside your team to help efficiently implement and seamlessly integrate our Techno-Analytics solutions into your existing framework.</p>\r\n<ul>\r\n<li>Property Underwriting</li>\r\n<li>Risk Management &amp; Reporting</li>\r\n<li>Actuarial Analytics</li>\r\n<li>Data Mining &amp; Cleansing</li>\r\n</ul>', '1632119485-insurance.jpg', 'insurance-companies', 1, '2021-09-14 16:29:40', '2021-09-20 12:18:40'),
(8, 'Institutional Investors', '<p>We work with a diverse set of clients, including pension funds, endowments and foundations, and sovereign wealth funds. BTM Financial is the leading Independent Analytics institution, providing cutting edge cross-asset services for valuation &amp; portfolio management of various Financial Instruments. We are dedicated to helping you maximize your Investment Value.</p>\r\n<ul>\r\n<li>The investment strategy and value creation</li>\r\n<li>Asset Profiling/Benchmarking</li>\r\n<li>Portfolio Performance Monitoring and Value Enhancement</li>\r\n<li>Waterfall distribution Models</li>\r\n<li>Acquisition Support</li>\r\n<li>Due diligence and portfolio management</li>\r\n<li>Support functions</li>\r\n</ul>', '1632118720-investor.jpg', 'institutional-investors', 1, '2021-09-14 16:30:12', '2021-09-20 11:48:40'),
(9, 'Real Estate Companies', '<p>BTM Financial comprises seasoned Real Estate professionals having deep expertise in this domain with a background in Technology which enables us to provide our clients with an efficient solution.</p>\r\n<ul>\r\n<li>Full-Service Underwriting</li>\r\n<li>B-Piece Due Diligence</li>\r\n<li>Lease Abstraction</li>\r\n<li>Loan Sizing &amp; Origination Support</li>\r\n<li>Financial Statement Analysis</li>\r\n<li>Argus Modelling/DCF</li>\r\n<li>Valuation and&amp; Scenario Analysis</li>\r\n<li>Preliminary, operational, and commercial due diligence</li>\r\n<li>Pipeline Management System</li>\r\n</ul>', '1632119192-realestatet.jpg', 'real-estate-companies', 1, '2021-09-14 16:30:53', '2021-09-20 11:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `leaderships`
--

CREATE TABLE `leaderships` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_general_ci,
  `image` text COLLATE utf8mb4_general_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaderships`
--

INSERT INTO `leaderships` (`id`, `name`, `designation`, `about`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anupam Oberai', 'Senior Partner', 'Anupam has worked with companies such as Lehman Brothers and Goldman Sachs. He ran Goldman\'s fixed income and mortgage-backed structuring business in the US for over 10 years. Since 2008 he has developed a successful record as an entrepreneur. He has a Bachelor\'s degree with Honors from the University of Delhi and an MBA in Finance from the University of Hartford (USA). Anupam manages all client relationships and manages the business origination team globally. He is also the CEO of the company.', '1631882528-anupam-oberai.jpg', 1, '2021-09-17 18:12:08', '2021-09-17 18:13:32'),
(2, 'Anjul Oberai', 'Partner', 'Anjul has over 25 years of experience in the financial sector. He has worked in New York and Singapore with firms such as Lehman Brothers, Chase Manhattan Bank and Deutsche Bank in a variety of sales, analytical, research and senior managerial roles. Most recently he was a Managing Director at Deutsche Bank where he built a market leading institutional client business in fixed income and equities across Asia. He has a Bachelor\'s Degree with Honors in Economics from the University of Delhi and an MBA in Finance from the University of Hartford (USA). He is based in Singapore and is the key client relationship manager, business originator and contact for Asia.', '1631882681-anjul-oberai.jpg', 1, '2021-09-17 18:14:41', '2021-09-17 18:14:41'),
(3, 'Rajendra Birla', 'Partner', 'Rajendra has an extensive experience in managing large teams of Business Analysts and Technical staff and is in charge of all the development & support teams. Rajendra holds a Master\'s degree in Finance and has worked extensively on valuation and analytics of the fixed income securities and credit derivatives for CMBS, RMBS and CDO space.', '1632134550-rajendra-birla.jpg', 1, '2021-09-20 16:12:30', '2021-09-20 16:12:30'),
(4, 'Gaurav Singh', 'Senior Technology Manager', 'Gaurav is an accomplished software executive with over 12 years experience in the software industry. He is a senior member of the technology team and has hands on experience with all languages including .NET, Java, Python, Big Data Analytics and Databases. He oversees the product roadmap and engineering execution for all model development projects.', '1632134588-gaurav-singh.jpg', 1, '2021-09-20 16:13:08', '2021-09-20 16:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int NOT NULL,
  `page_name` varchar(100) DEFAULT NULL,
  `page_title` varchar(200) DEFAULT NULL,
  `page_detail` longtext,
  `image` text,
  `meta_title` text,
  `meta_description` text,
  `meta_keyword` text,
  `is_active` tinyint NOT NULL DEFAULT '1' COMMENT '1=Active,0=Inactive',
  `created_by` int DEFAULT NULL,
  `modified_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_title`, `page_detail`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `is_active`, `created_by`, `modified_by`, `created_at`, `modified_at`) VALUES
(1, 'About us', 'We do things differently', '<p>We are a boutique advisory &amp; data analytics firm which provides tailor-made solutions for its clients. In today&rsquo;s ever-changing business and market landscape, companies need a way to do more with less-that is where we come into the picture.</p>\r\n\r\n<p>Based on our experience in financial advisory, application development, data science, and analytics, we assist the client in making key decisions based on valuations, data management, big data analytics solutions, business intelligence, analytics, and other customized solutions.</p>\r\n\r\n<p>We provide tools that enable clients to make smart, informed, and effective decisions with customization and flexibility being our hallmarks. We believe market intelligence, diligence, and execution don&rsquo;t have to be prohibitively expensive. Our value proposition lies in the flexibility of our engagement model, allowing clients to have complete control, while ultimately&nbsp;lowering costs.</p>', '1631901451-about-bg.jpg', '', '', '', 1, 1, 1, '2019-11-26 00:00:00', '2021-09-17 23:27:31'),
(2, 'Life At BTM', 'Life At BTM', '<p class=\"career-text\">Life at BTM Financial is about working in an environment of accelerated technology innovation and analytics</p>\r\n<p class=\"career-text\">Our strengths lie in our people. Employees who are passionate about building a career in Finance, Analytics, Advance Technology, Machine Learning, and AI, join BTM Financial to deliver impactful solutions to clients globally.</p>\r\n<div class=\"clearfix\">&nbsp;</div>', '1631901292-life-at.jpg', '', '', '', 1, 1, 1, '2019-11-26 00:00:00', '2021-10-01 13:23:25'),
(3, 'We Aim For The Stars', 'We Aim For The Stars', '<p class=\"career-text\">BTM Financial prides itself on hiring only the brightest and most talented individuals in the industry. Over 80% of our research and analytics team previously worked for world-class professional services firms and over 97% of the research and analytics team have advanced degrees. Our focus is to hire the most experienced, qualified and capable individuals for each role.</p>', '1631901373-aim.jpg', '', '', '', 1, NULL, 1, '2021-09-17 15:01:29', '2021-10-01 14:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_queries`
--

CREATE TABLE `proposal_queries` (
  `id` bigint NOT NULL,
  `project_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `job_location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `project_leader` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `company` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contact_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `summary` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `desired_outcome` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `action_completion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `project_schedule` date DEFAULT NULL,
  `projected_budget` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `requirements` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `accepted_date` date DEFAULT NULL,
  `acceptance` date DEFAULT NULL,
  `signature` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal_queries`
--

INSERT INTO `proposal_queries` (`id`, `project_name`, `job_location`, `start_date`, `finish_date`, `project_leader`, `company`, `contact_name`, `phone`, `email`, `address`, `summary`, `desired_outcome`, `action_completion`, `project_schedule`, `projected_budget`, `requirements`, `accepted_date`, `acceptance`, `signature`, `created_at`) VALUES
(1, 'crm', 'dasd', '2021-09-10', '2021-09-15', '', 'Zenwebnet', 'Masih Haider', '07290803902', 'masi@zenwebnet.com', 'Okhla Vihar', 'ghchg', '45', 'ghcgh', '2021-09-10', '67', 'nmbmn', '2021-09-05', '2021-09-15', '1632115362-data.jpg', '2021-09-20 10:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `company` text,
  `message` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`query_id`, `name`, `email`, `phone`, `company`, `message`, `created_at`) VALUES
(1, 'Masih Haider', 'masi@zenwebnet.com', '07290803902', 'Zenwebnet', 'Testing solution page query', '2021-09-18 15:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint NOT NULL,
  `title` text COLLATE utf8mb4_general_ci,
  `home_desc` text COLLATE utf8mb4_general_ci,
  `short_desc` longtext COLLATE utf8mb4_general_ci,
  `description_1` longtext COLLATE utf8mb4_general_ci,
  `description_2` longtext COLLATE utf8mb4_general_ci,
  `image` text COLLATE utf8mb4_general_ci,
  `home_image` text COLLATE utf8mb4_general_ci,
  `header_image` text COLLATE utf8mb4_general_ci,
  `slug` text COLLATE utf8mb4_general_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `home_desc`, `short_desc`, `description_1`, `description_2`, `image`, `home_image`, `header_image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Application Services', 'We provide comprehensive consulting services, financial services software engineering together with the key technology acceleration solutions. From ideation to POC, to deployment, to all-inclusive support, our professionals harness innovation and deliver an end-to-end experience.', '<p>We provide comprehensive consulting services, financial services software engineering together with the key technology acceleration solutions. From ideation to POC, to deployment, to all-inclusive support, our professionals harness innovation and deliver an end-to-end experience. We strive to integrate technology solutions while increasing bandwidth to seamlessly provide leverage to your current teams without increasing headcount.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Legacy apps migration</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>We migrate critical parts of your on-premise systems to the cloud, structuring the large volume of legacy data and the most critical features in secure warehouses.</p>\r\n<h2>Real-time analytics and forecasting</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>We visualize important financial insights from analytics and reporting systems as well as assist in making data-driven decisions for credit scoring using AI, Machine Learning, and Big Data technologies.</p>\r\n<h2>Distributed ledger technology</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>We apply Blockchain technology to improve security and transparency for loan management.</p>\r\n<h2>Microservices architecture</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>We focus on the flexibility of software to make it responsive to changing demands and implement new features faster without extra effort.</p>\r\n</div>\r\n</div>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Why BTM Financial</h2>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><span style=\"font-weight: 400;\">Ability to build models in any programming language such as C, C++, C#, VBA, Python, .Net, Java etc.</span></li>\r\n<li>Our credit spread framework acts as a bridge across multiple markets when valuing credit instruments, utilizing information from a variety of sources, including equities, bonds, and CDS.</li>\r\n<li>Tailor made professional services offered to cater the investment objective of different investors.</li>\r\n<li>Deal Structuring analytics developed as Web based applications.</li>\r\n<li>Process Automation using tools like Intex, Trepp, Bloomberg, Polypath, WSA, Dealmaker etc.</li>\r\n<li>Experienced team in database architecture like MS SQL products, Oracle DBs etc.</li>\r\n</ul>\r\n</div>\r\n</div>', '1633066632-application.jpg', '1632139285-application.png', '1633075642-bg-application-services.webp', 'application-services', 1, '2021-09-14 14:46:57', '2022-01-13 12:01:38'),
(2, 'Data & Analytics', 'BTM Financial provides advance data analytics, robust data management tools, and visualization solutions to help firms manage exposure to business risks and meet their regulatory requirements. We can help you unlock powerful analytics insights by tapping into data you didn\'t even know you had.', '<p>BTM Financial provides advance data analytics, robust data management tools, and visualization solutions to help firms manage exposure to business risks and meet their regulatory requirements. We can help you unlock powerful analytics insights by tapping into data you didn\'t even know you had.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Data Analytics Services</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<h3 class=\"sub-heading\">Intelligent Data Governance &amp; Compliance</h3>\r\n<p>Achieve sustained data management and governance, and compliance through automated data discovery and fingerprinting. As part of our data governance consulting services &amp; solutions, our data stewards at BTM Financial collaborate with the clients to standardize, secure and integrate data through appropriate data governance models and strategies.</p>\r\n<p>Our perspective ensures the establishment of data-centric views, enterprise-wide data management, and data quality.</p>\r\n<h3 class=\"sub-heading\">Data Science</h3>\r\n<p>Data science and machine learning are profoundly impacting businesses and are rapidly becoming critical for differentiation and sometimes survival. Businesses will continue to adapt the latest competitive strategies to stay ahead of the curve every day and the two most striking features of this transition are increased automation of data processes and delivery of instantaneous analytics solutions.</p>\r\n<p>BTM Financials&rsquo; data science services help you frame complex business problems as machine learning or operations research problems to unveil better data science solutions.</p>\r\n<h3 class=\"sub-heading\">Data Engineering</h3>\r\n<p>In this data-driven world, all modern technology platforms reinforce data-driven transformation. BTM Financials&rsquo; big data engineering services enable your data strategy &ndash; ensuring access to the right data, at the right time, in the right format, to help your advanced analytics thrive.</p>\r\n<h3 class=\"sub-heading\">Data Warehouse</h3>\r\n<p>BTM Financial offers a powerful data management platform to help financial institutions manage risks and regulatory compliance effectively.</p>\r\n<h3 class=\"sub-heading\">Data Visualization</h3>\r\n<p>BTM Financial offers comprehensive solutions that deliver powerful business, management, and regulatory insight for institutions. Our data visualization experts help you to identify new opportunities, address complex issues, enhance risk management, and assist with regulatory compliance.</p>\r\n<h3 class=\"sub-heading\">Risk Data</h3>\r\n<p>BTM Financial industry-leading global data solutions help financial institutions improve their strategic planning and capital and risk management practices.</p>\r\n<h3 class=\"sub-heading\">Big Data Analytics</h3>\r\n<p>Big data Analytics offers great opportunities for organizations to improve efficiency. In today&rsquo;s world where volume, velocity, and type of data continue to increase, so companies must work with Big Data. Our data analytics capabilities and advanced analytics skills helping organizations to generate meaningful business insights.</p>\r\n<h4 class=\"sub-heading\">Our Big Data expertise includes:</h4>\r\n<ul>\r\n<li>Hypercubes, OLAP.</li>\r\n<li>In-Memory Databases</li>\r\n<li>Apache Hadoop, R, Spark.</li>\r\n<li>NoSQL and columnar databases</li>\r\n<li>Data modelling, ETL, batch loading, aggregation, reporting</li>\r\n<li>Handle cluster management, node management.</li>\r\n<li>Help integrate Big Data platforms with data analytics</li>\r\n</ul>\r\n</div>\r\n</div>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Business Intelligence &amp; Data Visualization Services</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>BTM Financial provides business intelligence &amp; data visualization solutions to help you rapidly integrate data from different sources and develop key metrics for faster decisions.</p>\r\n<h3 class=\"sub-heading\">Managed Reporting Services</h3>\r\n<p>We have expertise in developing and deploying BI and data reporting solutions on leading platforms including Tableau, QlikView, Microsoft &amp; Oracle.</p>\r\n<p>Automated Data reporting services: Schedule data reporting and distribute reports and dashboards periodically.</p>\r\n<h3 class=\"sub-heading\">Dashboards &amp; Visualization</h3>\r\n<p>We develop dashboards to assist decision-making by encapsulating large volumes of data in intuitive graphical storyboards.</p>\r\n<p>We create visualizations that collate and display large amounts of information in simple and accessible formats</p>\r\n</div>\r\n</div>', '1631874896-data.jpg', '1632139963-data-home.png', '1633077775-bg-data-analytics.webp', 'data-analytics', 1, '2021-09-14 15:19:39', '2021-10-01 14:12:55'),
(3, 'Technology Consulting', 'BTM Financial has its foundations in research, is extremely strong in analytics and has uniquely differentiated itself by cogently combining its analytics and technology capabilities to create compelling business outcomes for its technology customers.', '<p>BTM Financial has its foundations in research, is extremely strong in analytics and has uniquely differentiated itself by cogently combining its analytics and technology capabilities to create compelling business outcomes for its technology customers.</p>\r\n<p>By applying our expertise in financial engineering, software engineering and quantitative modelling, we help to develop advanced solutions to implement new businesses and streamline existing ones.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Application Development and Modelling</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Comprehensive &amp; Integrated models like web models, desktop models, or excel models on any platform such as.NET, Java, etc. using cloud computing and data storage technologies like Oracle, MS SQL Server, MySQL, etc.</p>\r\n<h2>Implementation of Artificial Intelligence and Blockchain</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Experienced team with expertise in using Artificial Intelligence systems like IBM Watson, Microsoft Azure, etc. along with setting up of open distributed Ledger technology like BLOCKCHAIN.</p>\r\n<h2>Third-Party API</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Integrating INTEX, TREPP, and Bloomberg APIs for data analytics as well as cash flow engine for faster execution and greater efficiency</p>\r\n<h2>AI &amp; NLP-Based Data Treatment</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Fast and real-time insight generation.</p>\r\n<p>Highly scalable data collection using automated solutions.</p>\r\n</div>\r\n</div>', '', '1632134103-technology.jpg', '1632140277-technology.png', '1633077811-bg-technology-consulting.webp', 'technology-consulting', 1, '2021-09-14 15:20:08', '2022-01-13 11:38:50'),
(4, 'Cloud Computing', 'BTM Financial helps you harness the cloud to create delightful experiences, open new avenues of collaboration, and optimize your value chain to generate profit and growth.', '<p>BTM Financial helps you harness the cloud to create delightful experiences, open new avenues of collaboration, and optimize your value chain to generate profit and growth.</p>\r\n<p>In the age of disruption, the cloud is the foundation for digital agility, changing the way we live and work, enabling us to do more with less, and accelerating the pace of human innovation. BTM Financial helps you harness the cloud to create delightful experiences, open new avenues of collaboration, and optimize your value chain to generate profit and growth.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Services:</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<h3 class=\"sub-heading\">Cloud App Development</h3>\r\n<p>We develop and deploy cloud applications, each designed to be browser-agnostic, future-proof and highly scalable. We combine mobile-first design techniques with inscrutable server-side programming and rich database functionality to create high-performance enterprise cloud apps. Our integration services allow for cloud applications to deploy in public, private or hybrid environments.</p>\r\n<h3 class=\"sub-heading\">Cloud Migration Services</h3>\r\n<p>We are managed service providers to migrate apps, workflows and whole enterprise infrastructures to the cloud using thoughtful migration methods that limit system downtime and ensure data integrity. We also supply platform and cloud infrastructure refactoring services, if necessary. Whenever possible, we opt for parallel and automated migration methods.</p>\r\n<h3 class=\"sub-heading\">Cloud Computing Architecture</h3>\r\n<p>Cloud architecture is critical for eliminating siloed data and ensuring mission-critical processes &ldquo;communicate&rdquo; with one another. We leverage enterprise service buses and service-oriented architectures to streamline data flows and publish your APIs in the cloud to facilitate easy third-party integrations.</p>\r\n<h3 class=\"sub-heading\">Cloud Backup Solutions</h3>\r\n<p>To guard against disastrous system outages or data losses, we can construct community-based, distributed, inter-cloud and multi-cloud solutions. We have experience building cloud storage solutions that live on most popular IaaS offerings &ndash; Amazon Web Services (AWS), Microsoft Azure and Google Cloud Platform, to name a few &ndash; as well as combinations of multiple hosts.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Benefits of cloud services:</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<h3 class=\"sub-heading\">Reduced IT costs</h3>\r\n<p>Moving to cloud computing may reduce the cost of managing and maintaining your IT systems.</p>\r\n<h3 class=\"sub-heading\">Scalability</h3>\r\n<p>Your business can scale up or scale down your operation and storage needs quickly to suit your situation, allowing flexibility as your needs change.</p>\r\n<h3 class=\"sub-heading\">Business continuity</h3>\r\n<p>Protecting your data and systems is an important part of business continuity planning. Whether you experience a natural disaster, power failure or other crisis, having your data stored in the cloud ensures it is backed up and protected in a secure and safe location.</p>\r\n<h3 class=\"sub-heading\">Collaboration efficiency</h3>\r\n<p>Collaboration in a cloud environment gives your business the ability to communicate and share more easily outside of the traditional methods.</p>\r\n</div>\r\n</div>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Why BTM Financial</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Ability to combine modern analytics technologies with strong research capabilities to deliver compelling business outcomes.</p>\r\n<p>We bring together the right mix of software, services, capabilities and professionals utilizing a tech-agnostic approach to solve your business needs.</p>\r\n<p>Product mindset applied to the way we deliver services allows us to take full ownership and position ourselves as your extension partners.</p>\r\n<p>We are able to meet the rigor and precision expected by global technology customers.</p>\r\n</div>\r\n</div>', '1632133991-cloud.jpg', '1632140335-cloud.png', '1633077844-bg-cloud-computing.webp', 'cloud-computing', 1, '2021-09-14 15:20:44', '2022-01-13 11:39:43'),
(5, 'Structured Finance', 'BTM Financial works with the structured finance desks of investment banks and institutional investors globally, helping them build rigorous and scalable analytical processes to support their key business functions such as asset finance, structuring, portfolio management, research and trading, risk analytics and reporting.', '<p><span style=\"font-weight: 400;\">BTM Financial works with the structured finance desks of investment banks and institutional investors globally, helping them build rigorous and scalable analytical processes to support their key business functions such as asset finance, structuring, portfolio management, research and trading desk support, risk analytics and reporting.</span></p>\r\n<p>We have special expertise in analyzing structured products such as RMBS, CMBS, CLOs, ABS CDOs, other consumer ABS as well as residential mortgages, commercial mortgages &amp; corporate loan portfolios.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Structured Finance</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Our analysts work as a natural extension of client teams, providing support on critical tasks such as the following:</p>\r\n<ul>\r\n<li>Loan tape cracking</li>\r\n<li>Waterfall Modelling</li>\r\n<li>Sell-side/buy-side research</li>\r\n<li>Valuation, stress testing and scenario analysis</li>\r\n<li>Custom database/technology solutions</li>\r\n</ul>\r\n<p>Our experienced and dedicated structured finance professionals pride themselves in their ability to work in multi-asset-class experience across functions in the securitisation space.</p>\r\n<p>Our deep domain understanding and tool-agnostic approach, coupled with in-house custom technology offerings, enable us to provide highly relevant, efficient and scalable solutions that seamlessly integrate with existing client systems and processes.</p>\r\n<h3 class=\"sub-heading\">Support We Offer in Structured Finance Services</h3>\r\n<p>BTM Financials&rsquo; structured finance solutions support growth, efficiency and risk management objectives that structured finance investors need to meet. We provide users with comprehensive coverage and integrated capabilities across all structured asset classes.</p>\r\n<h2>Support services</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Loan tape cracking</li>\r\n<li>Portfolio Management</li>\r\n<li>Waterfall Modelling</li>\r\n<li>Underlying asset analysis</li>\r\n<li>Investor reporting</li>\r\n</ul>\r\n<h2>Structured Finance Risk &amp; Regulatory Solutions</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Analytical support for internal reporting and regulatory submission.</li>\r\n<li>Stress testing analytics</li>\r\n<li>Model Validation</li>\r\n<li>Analytical support in regulatory frameworks like Basel, Dodd-Frank and IFRS</li>\r\n</ul>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>\r\n</div>', '', '1632133818-structured.jpg', '1632140389-finance.png', '1633077876-bg-structured-finance.webp', 'structured-finance', 1, '2021-09-14 16:31:40', '2022-01-13 12:11:19'),
(6, 'Quant Analytics', 'Add quant analytics, mathematics and technological specialists to strengthen your investment teams.\r\nWe developed financial software and data applications for traditional investment managers, hedge funds, investment bankers and proprietary trading desks.', '<p>Add quant analytics, mathematics and technological specialists to strengthen your investment teams.</p>\r\n<p>We develop financial software and data applications for traditional investment managers, hedge funds, investment bankers and proprietary trading desks.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Our analysts work as a natural extension of client teams, providing support on critical tasks such as the following:</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>On-demand data engineering from sourcing and cleaning to architecture and design, including traditional and alternative approaches.</p>\r\n<p>Advanced analytics with quantitative modelling, back-testing, clustering and optimisation, to help refine your investment strategies for success.</p>\r\n<p>Faster insights from a digital delivery platform including web applications, BI dashboards and fully-customisable visualisations.</p>\r\n<p>State of the art technologies including AI and machine learning to help extract insights from large datasets.</p>\r\n<p>Our Quant Analytics solution provides the expertise, experience and technology you need to manage, analyse and visualise your data &ndash; turning algorithms into applications and data into investment opportunities, as and when you need them. we can provide leverage to your team members and enhance their effectiveness. You get:</p>\r\n<h2>End-to-end financial data engineering</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Aggregate and validate your data with expert-driven data services, from sourcing and cleaning, to sophisticated data architecture and design.</p>\r\n<h2>Advanced Investment modelling analytics</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Innovate traditional investment processes with contemporary portfolio management techniques such as advanced data science and alternative analytics &ndash; all driven by the latest AI, machine learning and deep learning techniques.</p>\r\n<h2>Risk Analytics</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Asses portfolio and wholesale financial risk with in-depth model methodology deployments, validations, back testing, scenario intelligence, stress and shock testing, and more.</p>\r\n<h2>Asset-Liability Management (ALM) Support</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Support and develop your ALM system to include analytics on liquidity monitoring, balance sheet management, scenario analysis and specialist modules for pension plans.</p>\r\n<h2>Customized visualization and BI</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Use custom applications, portals and dashboards to cut through the noise and get the analysis you need &ndash; when you need them.</p>\r\n<h2>With Quant Analytics from The BTM Financial, you can:</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Flexibly leverage your team with the expertise needed to test your strategies and turn algorithms into easy-to-use apps and dashboards.</p>\r\n<p>Reduce costs with flexible access to the talent and tools you need without lengthy and expensive recruitment processes.</p>\r\n<p>Scale at will with on-demand analysts, mathematicians, programmers and risk experts available as and when projects require.</p>\r\n<p>Add to your experience with quant experts that contribute to your strategic thinking.</p>\r\n</div>\r\n</div>', '', '1632133758-quantative.jpg', '1632140447-quant.png', '1633077930-bg-quant-analytics.webp', 'quant-analytics', 1, '2021-09-14 16:32:02', '2022-01-13 11:52:10'),
(7, 'Fixed Income & Equity Analytics', 'BTM Financial solutions provide highly granular analytics, valuation, risk management, and portfolio management of various equity & fixed income securities and derivatives. Our solutions also include products for high-performance data management, analysis & modelling associated with these asset classes.', '<p>BTM Financial solutions provide highly granular analytics, valuation, risk management, and portfolio management of various equity &amp; fixed income securities and derivatives. Our solutions also include products for high-performance data management, analysis &amp; modelling associated with these asset classes.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Fixed Income &amp; Equity Analytics support we offer:</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Qualitative and quantitative information on company background to help form opinion and take decisions.</li>\r\n<li>Custom support across the fixed income spectrum including investment grade, high yield, and distressed debt.</li>\r\n<li>Qualitative and quantitative support across fixed income products including leverage finance, money markets, structured finance.</li>\r\n<li>Cash flow models, indenture screening, covenant headroom monitoring, stress testing, and scenario analysis.</li>\r\n</ul>\r\n<h2>Quantitative Research</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Quantitative Credit Strategy and Analytics</li>\r\n<li>Machine Learning</li>\r\n<li>Equity Strategy Modelling and Research Support</li>\r\n<li>Structured Products</li>\r\n</ul>\r\n</div>\r\n</div>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Why BTM Financial</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<h3 class=\"sub-heading\">Support Across Life Cycle</h3>\r\n<p>Rules-based, analytical, and judgement-oriented tasks</p>\r\n<h3 class=\"sub-heading\">Scale &amp; Flexibility</h3>\r\n<p>Flexible engagement models and automation that enhance efficiency</p>\r\n</div>\r\n</div>', '1632133493-fixed.jpg', '1632140625-fixed.png', '1633077968-bg-fixed-income-equity-analytics.webp', 'fixed-income-equity-analytics', 1, '2021-09-14 16:32:24', '2021-10-01 14:16:08'),
(8, 'Valuation &  Advisory Services', 'Our Valuation and Advisory Services group is known to deliver high-quality, consistent market leading valuations around the globe. We have been at the forefront in providing accurate, reliable and timely valuations critical to the success of industry.', '<p>Our Valuation and Advisory Services group is known to deliver high-quality, consistent market leading valuations around the globe. We have been at the forefront in providing accurate, reliable and timely valuations critical to the success of industry.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Restructuring and Debt Advisory</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>BTM Financial enables its clients to face this challenge of a sudden rise in demand by providing support across the restructuring and debt advisory spectrum. We enable our clients to win more mandates and expand their outreach by supporting insolvency and reorganization support, liquidity management, creditor advisory, and turnaround activities.</p>\r\n<ul>\r\n<li>Capital structure Analysis</li>\r\n<li>Company Profiling</li>\r\n<li>Credit Analysis</li>\r\n<li>Covenant Analysis</li>\r\n</ul>\r\n<h2>Equity Capital Market</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>We provide a broad range of equity capital markets support to investment banks and advisory firms globally</p>\r\n<ul>\r\n<li>Market monitoring and updates</li>\r\n<li>Benchmarking</li>\r\n<li>Pitchbooks</li>\r\n<li>Comps/analysis</li>\r\n</ul>\r\n<h2>Transaction Advisory</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>We assist our clients in conducting a thorough analysis of a financial decision and the effectiveness and fairness of a transaction and financing solution. Our experienced specialists follow a well-structured approach in supporting a diverse range of valuation engagements for corporate finance transactions, restructurings, fund-raising transactions, and capital-intensive project</p>\r\n<ul>\r\n<li>Business Valuation</li>\r\n<li>Cash Flow Models</li>\r\n<li>Model Validation and Improvements</li>\r\n<li>Credit Analysis</li>\r\n</ul>\r\n</div>\r\n</div>', '', '1632133404-valuation.jpg', '1632140698-valuation.png', '1633078142-bg-valuation-and-advisory-services.webp', 'valuation-advisory-services', 1, '2021-09-14 16:33:06', '2022-01-13 12:13:30'),
(9, 'Artificial Intelligence & Machine Learning', 'BTM Financial tries to stay ahead in the world of technology by gaining knowledge of cutting-edge technologies and delivering them as a service to our clients.\r\nWe create everything that your enterprise needs from training data to working with unstructured text, images and videos for Machine Learning.', '<p>BTM Financial tries to stay ahead in the world of technology by gaining knowledge of cutting-edge technologies and delivering them as a service to our clients. We create everything that your enterprise needs from training data to working with unstructured text, images and videos for Machine Learning.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Artificial Intelligence &amp; Machine Learning</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Artificial Intelligence, even in its early stages has huge potential to transform a business in many ways. Most businesses won&rsquo;t be able to have an in-house team for developing and implementing Artificial Intelligence-based solutions in their company. This is where AI as a service gains relevance.</p>\r\n<p>We have the expertise and ability to strategize and execute artificial intelligence services, integrated with cognitive technology to support your legacy business applications and provide a full spectrum of services including User Behaviour Analytics, Advanced Business Analytics, Big Data Analytics, NLP, Deep Learning, and more.</p>\r\n<h2>How we do it</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<h3 class=\"sub-heading\">Understand</h3>\r\n<p>We analyze and understand data that includes images, audio, video and unstructured text.</p>\r\n<h3 class=\"sub-heading\">Reason</h3>\r\n<p>Our problem-solving methods involve suitable planning, reasoning, inference and simulations to get desired results.</p>\r\n<h3 class=\"sub-heading\">Learn</h3>\r\n<p>We utilize machine learning processes for improving subject-matter expertise and meeting the objectives of your applications and system.</p>\r\n<h3 class=\"sub-heading\">Interact</h3>\r\n<p>Beneficial for developing next-generation interfaces like chatbots that can interact with end users.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Our Services</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<h3 class=\"sub-heading\">Designing</h3>\r\n<p>Designing Algorithms are easy but making people to use is difficult. We design AI models for advanced Artificial Intelligence solutions into existing business model to maximize the return of Investment.</p>\r\n<h3 class=\"sub-heading\">Development</h3>\r\n<p>BTM Financial has expertise&nbsp; to develop advanced Artificial Intelligence applications to empower your business with Automated Machine Learning Solutions.</p>\r\n<h3 class=\"sub-heading\">Deployment</h3>\r\n<p>Our AI Algorithms and Machine learning models are Deployed in that manner which can deliver the maximum benefits and provides huge profit to your business.</p>\r\n<h3 class=\"sub-heading\">Customization</h3>\r\n<p>We have an ability to create customized AI-Based Applications which fulfil your unique AI requirements and match industry standards to always on top.</p>\r\n<h3 class=\"sub-heading\">Integration</h3>\r\n<p>Our seamless Machine learning services of Advanced Artificial Intelligence can integrate with your existing business model to maximize the Conversion of clients.</p>\r\n<h3 class=\"sub-heading\">Strategy and Consulting</h3>\r\n<p>We have team of expert Data behaviour analysis and AI developer to help your business to embark on a transformational journey with adoption of futuristic technology.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Our Services</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<h3 class=\"sub-heading\">Designing</h3>\r\n<p>Designing Algorithms are easy but making people to use is difficult. We design AI models for advanced Artificial Intelligence solutions into existing business model to maximize the return of Investment.</p>\r\n<h3 class=\"sub-heading\">Development</h3>\r\n<p>BTM Financial has expertise experience to develop advanced Artificial Intelligence applications to empower your business with Automated Machine Learning Solutions.</p>\r\n<h3 class=\"sub-heading\">Deployment</h3>\r\n<p>Our AI Algorithms and Machine learning models are Deployed in that manner which can deliver the maximum benefits and provides huge profit to your business.</p>\r\n<h3 class=\"sub-heading\">Customization</h3>\r\n<p>We have an ability to create customized AI-Based Applications which fulfil your unique AI requirements and match industry standards to always on top.</p>\r\n<h3 class=\"sub-heading\">Integration</h3>\r\n<p>Our seamless Machine learning services of Advanced Artificial Intelligence can integrate with your existing business model to maximize the Conversion of clients.</p>\r\n<h3 class=\"sub-heading\">Strategy and Consulting</h3>\r\n<p>We have team of expert Data behaviour analysis and AI developer to help your business to embark on a transformational journey with adoption of futuristic technology.</p>\r\n</div>\r\n</div>', '', '1632132357-artificial.png', '1632140758-artificial.jpg', '1633078060-bg-artificial-intelligence.webp', 'artificial-intelligence-machine-learning', 1, '2021-09-14 16:33:33', '2022-01-13 12:15:10'),
(10, 'Specialized Support Team', 'We provide the speed, professional acumen, and flexibility your team needs to scale quickly. With the staff augmentation model, you have the opportunity to personally choose the candidates and manage them with the methods you prefer.', '<p>We provide comprehensive consulting services, financial services software engineering together with the key technology acceleration solutions. From ideation to POC, to deployment, to all-inclusive support, our professionals harness innovation and deliver an end-to-end experience. We strive to integrate technology solutions while increasing bandwidth to seamlessly provide leverage to your current teams without increasing headcount.</p>', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Trading Support</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Our team operates with 24x7 services depending upon the need to provide full coverage of trade support, real-time dashboards, accounting, and investor reporting.</p>\r\n<h2>Valuation support</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Our valuation experts help you make decisions confidently, enhance your results, and help you get ahead of key issues.</p>\r\n<h2>Regulatory Support</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>Our multi-disciplinary team and unrivalled experience mean we understand the regulatory environment and are best placed to assist you with meeting your obligations. We have performed CCAR validation, Stress Analysis, and Valuation under Basel norms &amp; the Computation of regulatory capital charges for exposure to securitized products using a risk-weighted methodology.</p>\r\n<h2>Surveillance Team</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>BTM Financial can provide a team for a single person of any size for the project required by the client along with the project manager.</p>\r\n</div>\r\n</div>', '', '1631874469-application.jpg', '1632140788-support.png', '1633078087-bg-specialized-support-team.webp', 'specialized-support-team', 1, '2021-09-14 16:33:58', '2021-10-01 14:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `id` bigint NOT NULL,
  `title` text COLLATE utf8mb4_general_ci,
  `short_desc` text COLLATE utf8mb4_general_ci,
  `description` longtext COLLATE utf8mb4_general_ci,
  `image` text COLLATE utf8mb4_general_ci,
  `slug` text COLLATE utf8mb4_general_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`id`, `title`, `short_desc`, `description`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pipeline management system (cloud, application services, business process outsourcing, data & analytics, technology consulting, automation)', 'To develop a Pipeline Management System that contributes end-to-end development as well as integration of customized/Private APIs. APIâ€™s access /authentication is being provided in a very high secured environment.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>To develop a Pipeline Management System that contributes end-to-end development as well as integration of customized/Private APIs. API&rsquo;s access /authentication is being provided in a very high secured environment.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>To accomplished our objective, we developed APIs in such a way that it can be accessed using API wrapper/DLL or directly via API gateway</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Built API call management platform for log, authenticating and throttling API calls.</li>\r\n<li>Developed API for new and legacy enterprise application.</li>\r\n<li>Implemented internal and external APIs while leveraging exposed third-party services.</li>\r\n<li>Provided multi-process environment in back end as load balancer which is being written for API performance.</li>\r\n<li>Provided seamless interface for different API&rsquo;s so that user/client can use API&rsquo;s in easy manner.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/pipeline-management-system-high-level-architecture.png\" /></div>\r\n</div>', '1631876738-pipeline-management-system-thumbnail.jpg', 'pipeline-management-system-cloud-application-services-business-process-outsourcing-data-analytics-technology-consulting-automation', 1, '2021-09-17 16:35:38', '2021-09-20 12:35:57'),
(2, 'Audit & validation reporting of CLO model (structured finance, data & analytics)', 'Finding the Inconsistency in the collateral and bonds cash flows in the model which was being compared with third party cash flows.\r\nAudit of application of the cash flows due to various default and prepayment, partial prepayment scenarios.\r\nAuditing of priority of payments and providing our findings.\r\nFinding of miscalculation of various fees involved in the structuring and servicing process.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Finding the Inconsistency in the collateral and bonds cash flows in the model which was being compared with third party cash flows.</li>\r\n<li>Audit of application of the cash flows due to various default and prepayment, partial prepayment scenarios.</li>\r\n<li>Auditing of priority of payments and providing our findings.</li>\r\n<li>Finding of miscalculation of various fees involved in the structuring and servicing process.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Reporting the formula errors and conceptual errors in the model.</li>\r\n<li>Validated the calculations for various servicing fees which played an important part in the revenue calculation as well.</li>\r\n<li>Identifying the existing process and building the process manual.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Validated the calculations for various servicing fees which played an important part in the revenue calculation as well.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632121841-audit-validation-reporting-thumbnail.jpg', 'audit-validation-reporting-of-clo-model-structured-finance-data-analytics', 1, '2021-09-20 12:40:41', '2021-09-20 14:04:54'),
(3, 'Term Sheet Model(Structured Finance, Application Services, Data & Analytics, Technology Consulting, Automation)', 'Build a comprehensive model to process complex inputs and generate the Term Sheet report.\r\nTo Implement comprehensive error reporting to identify and track the source of all errors identified using the business rules.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Build a comprehensive model to process complex inputs and generate the Term Sheet report.</li>\r\n<li>To Implement comprehensive error reporting to identify and track the source of all errors identified using the business rules.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Deep dive analysis of client&rsquo;s existing systems in order to understand the methodology of the model.</li>\r\n<li>Process highly unstructured web-based inputs and Data from Sponsor file.</li>\r\n<li>Devise complex business logics to perform data validations, data analysis and error handling.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>The application drastically reduced the time required to undertake the process.</li>\r\n<li>Generated a wide array of reports according to the format specified by the client.</li>\r\n<li>Comprehensive error reporting to identify any anomalies and describing the reason for such anomalies around the data in the model.</li>\r\n<li>Implemented complex calculations efficiently to generate the Term Sheet.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/term-sheet-model-flow-diagram.png\" /></div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632126611-term-sheet-model-thumbnail.jpg', 'term-sheet-model-structured-finance-application-services-data-analytics-technology-consulting-automation', 1, '2021-09-20 14:00:11', '2021-09-20 14:00:11'),
(4, 'Regression Testing Suite Application (Quant Analytics, Application Services, Data & Analytics, Technology Consulting, Automation)', 'The C++ Testing Suite had approximately 3500 test cases and Excel is not designed to handle the sheer size and its internal tools are limited. The objective is to build regression test models in python.\r\nTo ensure that debugging is systematic and transparent for people who have not being involved in building the test.\r\nEnsuring that the process is consistent to be able to avoid “dependency”.\r\nTo make the code structured and written with a common discipline', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>The C++ Testing Suite had approximately 3500 test cases and Excel is not designed to handle the sheer size and its internal tools are limited. The objective is to build regression test models in python.</li>\r\n<li>To ensure that debugging is systematic and transparent for people who have not being involved in building the test.</li>\r\n<li>Ensuring that the process is consistent to be able to avoid &ldquo;dependency&rdquo;.</li>\r\n</ul>\r\n<p>To make the code structured and written with a common discipline</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Creating Common &amp; Utility classes for reuse and a modular framework</li>\r\n<li>XMLs are bifurcated in sub-groups for each test for an input &amp; expected results.</li>\r\n<li>Integration of the python-based framework to the existing build process.</li>\r\n<li>Modular framework for easy debugging.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>The new paradigm has standard code structure and a modular framework.</li>\r\n<li>The new framework helps to avoid duplication of code which is generally a problem in &ldquo;free style&rdquo; coding.</li>\r\n<li>XMLs were used to store all data at a centralized place.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/regression-testing-suite-application.png\" /></div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632126751-regression-testing-suite-application-thumbnail.jpg', 'regression-testing-suite-application-quant-analytics-application-services-data-analytics-technology-consulting-automation', 1, '2021-09-20 14:02:31', '2021-09-20 14:02:31'),
(5, 'Data Mart Platform (Artificial Intelligence, Application Services, Data & Analytics, Technology Consulting, Automation)', 'The Data Mart Platform is built to aggregate Loan, mortgage & other data from various sources and store it in a structured format in a central repository. This data is made accessible to other tools & third-party applications in a secure & efficient manner via REST based APIs.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>The Data Mart Platform is built to aggregate Loan, mortgage &amp; other data from various sources and store it in a structured format in a central repository. This data is made accessible to other tools &amp; third-party applications in a secure &amp; efficient manner via REST based APIs.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>AI based data processing platform to collect loan feeds from different sources and other third-party data providers.</li>\r\n<li>Data massaging, business rule implementation and error reporting engine.</li>\r\n<li>APIs to access data from central repository as Data Services for application usage.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Dynamic &amp; Intuitive User interface-based data upload platform.</li>\r\n<li>Efficient Data management, business rule implementation and error reporting engine.</li>\r\n<li>Availability of High-quality data processed through AI algorithm to maintain uniformity.</li>\r\n<li>Predictive analysis of loan &amp; mortgage data using Machine learning algorithm.</li>\r\n<li>Web based system manages Workflow, Surveillance as well as Reporting and provides a dynamic intuitive platform with high degree of customization.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/data-mart-platform-workflow-surveillance-reporting.png\" /></div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632127365-data-mart-platform-thumbnail.jpg', 'data-mart-platform-artificial-intelligence-application-services-data-analytics-technology-consulting-automation', 1, '2021-09-20 14:12:45', '2021-09-20 14:12:45'),
(6, 'Blockchain & AI Enabled lending Platform (Artificial Intelligence, Blockchain, Application Services, Data & Analytics, Technology Consulting, Automation)', 'The underlying objective of creating this application is to create a trust-less platform to facilitate the complete Lending process while ensuring complete transparency &amp; fairness in dissemination of information to all stakeholders.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>The underlying objective of creating this application is to create a trust-less platform to facilitate the complete Lending process while ensuring complete transparency &amp; fairness in dissemination of information to all stakeholders.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>The entire process starts with a Borrower (or Broker on behalf of Borrower) by uploading the related property &amp; borrower information/documents.</li>\r\n<li>Once uploaded, the loan application can be accessed by all the participating Lending agencies on the platform and the interested agencies proceed with due diligence/underwriting process.</li>\r\n<li>If the loan application meets all required criteria, these agencies then offer Loan to the borrowers with certain terms &amp; conditions.</li>\r\n<li>The borrower then needs to choose the loan offer that best suits the borrower\'s purpose.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Advantages</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<h3 class=\"sub-heading\">Transparency</h3>\r\n<p>No scope of collusion between the platform and any of the stakeholders</p>\r\n<h3 class=\"sub-heading\">Decentralized Application</h3>\r\n<p>By virtue of being a Blockchain enabled platform, this is a decentralized application where even if one node fails, the network would still be able to operate.</p>\r\n<h3 class=\"sub-heading\">Independent Platform</h3>\r\n<p>The various participants do not have to trust or rely on any central authority to oversee the transactions.</p>\r\n<h3 class=\"sub-heading\">Data Security</h3>\r\n<p>The technology ensures that all the recorded data is stored in an encrypted format thus ensuring top-notch data security.</p>\r\n<h3 class=\"sub-heading\">Artificial Intelligence &amp; IOT</h3>\r\n<p>Using AI based algorithms, Structured data can be extracted from borrower uploaded documents. Also, for IOT enabled properties, relevant data can be imported directly from the IOT servers.</p>\r\n<h3 class=\"sub-heading\">Auditability</h3>\r\n<p>The platform allows for comprehensive auditability as it stores all the historical data securely owing to immutable property of Blockchain.</p>\r\n<h3 class=\"sub-heading\">Token Generation</h3>\r\n<p>Custom utility Tokens will be generated to facilitate efficient transactions in the platform.</p>\r\n<h3 class=\"sub-heading\">Accurate Status Tracking</h3>\r\n<p>Know the exact status of the loan application at any given time with a few clicks.</p>\r\n<h3 class=\"sub-heading\">Underwriting Plugin</h3>\r\n<p>The platform provides the option of importing UW data from various sources including Lending agencies&rsquo; in-house web/desktop/excel based models.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>A new avenue to review loan applications easily by importing data from the lending agencies&rsquo; in-house Underwriting platform and make offers conveniently to worthy borrowers.</li>\r\n<li>A single comprehensive platform to apply for a loan and get loan quotations from different lending agencies in a completely transparent manner</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/blockchain-ai-enabled-lending-platform.png\" /></div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632127520-blockchain-ai-enabled-thumbnail.jpg', 'blockchain-ai-enabled-lending-platform-artificial-intelligence-blockchain-application-services-data-analytics-technology-consulting-automation', 1, '2021-09-20 14:15:20', '2021-09-20 14:15:20'),
(7, 'End to end mortgage analytics (Application Services, Data & Analytics, Technology Consulting, Structured Finance, Fixed Income & Equity Analytics, Automation)', 'Existing structuring solutions are third party tools that are license based on user and asset type making the cost structure very expensive.\r\nMost of the existing products are based on \"One size fits all\" approach & offers limited customization option to users.\r\nThe current Structuring platforms are “legacy systems” using archaic core technologies..\r\nThe available tools were designed for the initial world of agency deals and then adapted for other asset types and not designed “ground up”.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Existing structuring solutions are third party tools that are license based on user and asset type making the cost structure very expensive.</li>\r\n<li>Most of the existing products are based on \"One size fits all\" approach &amp; offers limited customization option to users.</li>\r\n<li>The current Structuring platforms are &ldquo;legacy systems&rdquo; using archaic core technologies..</li>\r\n<li>The available tools were designed for the initial world of agency deals and then adapted for other asset types and not designed &ldquo;ground up&rdquo;.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>The user writes the payment distribution rules using a very high-level easy to use scripting language.</li>\r\n<li>The application generates the Bond cashflows along with a variety of other reports as per the payment distribution rules.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>The Structuring Tool offers entire Deal structuring process - starting from loan modeling, writing pay rule structure to getting detailed customized reports.</li>\r\n<li>The tool offers dynamic and customized reports which includes Deal Snapshot, Loan Stratification, Loan/ Repline Cashflow, Collateral Cashflow, Bond Cashflow, Decrement Table &amp; Price/Yield Table.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/end-to-end-mortgage-analytics-model-overview.png\" /></div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632127656-end-to-end-mortgage-analytics-thumbnail.jpg', 'end-to-end-mortgage-analytics-application-services-data-analytics-technology-consulting-structured-finance-fixed-income-equity-analytics-automation', 1, '2021-09-20 14:17:36', '2021-09-20 14:17:36'),
(8, 'CMBS CREDIT MODEL (Application Services, Data & Analytics, Technology Consulting, Structured Finance, Fixed Income & Equity Analytics, Automation)', 'To design a database driven system to identify pieces of loans which exists in complex form e.g. A/B or Pari Passu structure. Also incorporate global assumptions which are NOI curve, Cap rate, Debt Yield threshold, largest tenant, LTV assumptions, Occupancy etc. for estimating Loss Severity, Timing and Amount of default, Balloon Loss Severity for each loan etc.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>To design a database driven system to identify pieces of loans which exists in complex form e.g. A/B or Pari Passu structure. Also incorporate global assumptions which are NOI curve, Cap rate, Debt Yield threshold, largest tenant, LTV assumptions, Occupancy etc. for estimating Loss Severity, Timing and Amount of default, Balloon Loss Severity for each loan etc.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Followed the bottom most approach to analyze the risk of the loan.</li>\r\n<li>NOI curves are generated based on various property types and MSA.</li>\r\n<li>These curves are based upon base, best as well as worst case scenarios. Cash flows are generated using Trepp API.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>This model projects the timing of default, amount of default, loss severity, recovery period, balloon loss severity, pay-down, extension months, reason of default/extension along with loan by loan stressed cash flow.</li>\r\n<li>This model is Web based tool with lot of flexibility and scalability.</li>\r\n<li>User has the flexibility to create, modify and analyze Portfolio and look at various reporting.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632128407-cmbs-credit-model-thumbnail.jpg', 'cmbs-credit-model-application-services-data-analytics-technology-consulting-structured-finance-fixed-income-equity-analytics-automation', 1, '2021-09-20 14:30:07', '2021-09-20 14:30:07'),
(9, 'Data Management & Reporting Tool (Technology Consulting, Data & Analytics, Automation, Application Services)', 'The client was looking for a solution that could read and analyze different sets (Images, video, geospatial etc.) of real estate data and to generate customized reports.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>The client was looking for a solution that could read and analyze different sets (Images, video, geospatial etc.) of real estate data and to generate customized reports.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>BTM came up with a detailed technology stack required to build a robust big data platform (HADOOP).</li>\r\n<li>We built the complete data layer by ingesting multiple data into mapR-FS cluster and writing JAVA based map-reduced queries to build a database.</li>\r\n<li>Deploying Apache Drill, which in turn were exposed to Tableau. By incorporating Tableau into the solution, BTM generated multiple reports.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Read and structured different types of client&rsquo;s data.</li>\r\n<li>Generated customized reports using TABLEAU.</li>\r\n<li>Produced Sales Comparable, Foreclosure, Transaction History, Property Retail, Property Statistics and Neighbor Report.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/data-management-reporting-tool.png\" /></div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632128555-data-management-reporting-tool-thumbnail.jpg', 'data-management-reporting-tool-technology-consulting-data-analytics-automation-application-services', 1, '2021-09-20 14:32:35', '2021-09-20 14:32:35'),
(10, 'Human Assisted Automation Suite (Artificial Intelligence, Data & Analytics, Automation, Business Process Outsourcing', 'The Client’s has tons of data manually updated by its analysts. The client wanted to establish fast, human assisted automation suite for minimizing errors and time utilization.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>The Client&rsquo;s has tons of data manually updated by its analysts. The client wanted to establish fast, human assisted automation suite for minimizing errors and time utilization.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>BTM extracted the relevant data files and validated the data to create a final catalogue of refined insights.</li>\r\n<li>We used python and SQL based database methodology to cleanse the extracted data.</li>\r\n<li>We have done performance tuning and query optimization of the structured data.</li>\r\n<li>We applied exception handling process to update the cleansed data on the centralized platform in accordance with the client&rsquo;s format requirements.</li>\r\n<li>Exposed the DataMart into SRSS tool and generated different reports as per client\'s requirement.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Implemented a seamless, human assisted automation tools for client&rsquo;s analysts.</li>\r\n<li>Ensured flexibility for analysts to add/delete anything effortlessly.</li>\r\n<li>Generated different customized reports as per client&rsquo;s requirements.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/human-assisted-automation-suite.png\" /></div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632128655-human-assisted-automation-thumbnail.jpg', 'human-assisted-automation-suite-artificial-intelligence-data-analytics-automation-business-process-outsourcing', 1, '2021-09-20 14:34:15', '2021-09-20 14:34:15'),
(11, 'Data Warehouse and Dashboard/Tear Sheet (Automation, Application Services, Data & Analytics)', 'To create a distributed data warehouse and a dashboard/Tear Sheet in order to analyze various type real estate data. The client was looking for an integrated solution that could track the whole set of data in a single dashboard view with various filtered criteria.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>To create a distributed data warehouse and a dashboard/Tear Sheet in order to analyze various type real estate data. The client was looking for an integrated solution that could track the whole set of data in a single dashboard view with various filtered criteria.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Built the complete data layer by ingesting data from multiple data sources into ETL and writing dotnet based applications to build distributed database which would act as a single source.</li>\r\n<li>Stored all data in data-Mart application which consists of different databases.</li>\r\n<li>OLAP is exposed to Tableau as well as to PIVOT in order to generate the customized reports.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Built a distributed DATAMART platforms to stored data in a standard format as per client&rsquo;s requirements.</li>\r\n<li>Generated different customized reports using Tableau and PIVOT in web-based platform.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/data-warehouse-and-dashboard-tear-sheet.png\" /></div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632128777-data-warehouse.jpg', 'data-warehouse-and-dashboard-tear-sheet-automation-application-services-data-analytics', 1, '2021-09-20 14:34:16', '2021-09-20 14:36:17'),
(12, 'Property and Loan Level Data Processing & Analytics (Automation, Application Services, Valuation and Advisory Services, Data & Analytics)', 'The underlying objective of creating this application is to process the unstructured data into structured format and performed the analytics on the cleansed data.', '<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>The Problem</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<p>The underlying objective of creating this application is to process the unstructured data into structured format and performed the analytics on the cleansed data.</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>Process</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Stored different format of data (CSV., XL, XML, JASON, PDF, Text) into DATAMART using ETL methodology.</li>\r\n<li>Performed validation on the stored data using SQL Procedures and C++ APIs.</li>\r\n<li>Unvalidated data is presented in the form of error reporting.</li>\r\n<li>Performed different kind of analytics/reporting on the structured data.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-12\">\r\n<h2>BTM Financial Solution</h2>\r\n<div class=\"bar_seprator\">&nbsp;</div>\r\n<ul>\r\n<li>Validated and structured huge volume of data.</li>\r\n<li>Window based application that stored, structured all format of data.</li>\r\n<li>Performed error reporting on the unvalidated data.</li>\r\n<li>Performed Advance analytics &amp; predictive analytics on the structured data and generated customized reports as per client requirement.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"../images/case-study/diagram/property-and-loan-level-data-processing-analytics.png\" /></div>\r\n</div>\r\n<div class=\"clearfix\">&nbsp;</div>', '1632128990-property-and-loan-level-data-processing-thumbnail.jpg', 'property-and-loan-level-data-processing-analytics-automation-application-services-valuation-and-advisory-services-data-analytics', 1, '2021-09-20 14:39:50', '2021-09-20 14:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` bigint NOT NULL,
  `title` text COLLATE utf8mb4_general_ci,
  `description` longtext COLLATE utf8mb4_general_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Programming Languages', '<ul>\r\n<li>Java</li>\r\n<li>.Net Core</li>\r\n<li>C#</li>\r\n<li>Asp.Net</li>\r\n<li>Python</li>\r\n<li>Vb.Net</li>\r\n<li>J2ee</li>\r\n<li>Php</li>\r\n<li>Node</li>\r\n<li>R</li>\r\n</ul>', 1, '2021-09-17 23:51:14', '2021-09-17 23:51:14'),
(2, 'Platforms', '<ul>\r\n<li>Sharepoint</li>\r\n<li>Cloud Including Azure</li>\r\n<li>Aws</li>\r\n<li>Google &amp; Edge Computing.</li>\r\n</ul>', 1, '2021-09-17 23:51:59', '2021-09-17 23:51:59'),
(3, 'Frameworks', '<ul>\r\n<li>Microservice Architecture</li>\r\n<li>Struts</li>\r\n<li>Springs</li>\r\n<li>Hibernate</li>\r\n<li>Django/Flask Python</li>\r\n<li>Laravelphp</li>\r\n<li>Http/2 &amp; Grpc</li>\r\n</ul>', 1, '2021-09-20 16:19:59', '2021-09-20 16:19:59'),
(4, 'Web-Front End', '<ul>\r\n<li>Reactjs</li>\r\n<li>Angularjs, Extjs</li>\r\n<li>Electronjs</li>\r\n<li>Nodejs</li>\r\n<li>Html5</li>\r\n<li>Css3</li>\r\n<li>Javascript</li>\r\n<li>Jquery</li>\r\n<li>Ajax</li>\r\n<li>Progressive Web Application.</li>\r\n</ul>', 1, '2021-09-20 16:21:05', '2021-09-20 16:21:05'),
(5, 'Protocol/ Services', '<ul>\r\n<li>XML</li>\r\n<li>JSON</li>\r\n<li>SOAP</li>\r\n<li>REST</li>\r\n<li>WSDL</li>\r\n<li>WCF</li>\r\n<li>WPF</li>\r\n<li>Web Services</li>\r\n<li>Windows Services</li>\r\n</ul>', 1, '2021-09-20 16:21:48', '2021-09-20 16:21:48'),
(6, 'Reporting', '<ul>\r\n<li>SSIS</li>\r\n<li>SSRS</li>\r\n<li>Crystal Report</li>\r\n<li>Sync Fusion</li>\r\n<li>Telerik</li>\r\n<li>DevEx</li>\r\n<li>Tableau</li>\r\n<li>BI reporting tools</li>\r\n</ul>', 1, '2021-09-20 16:22:31', '2021-09-20 16:22:31'),
(7, 'Databases', '<ul>\r\n<li>MS SQL</li>\r\n<li>Oracle</li>\r\n<li>MySQL</li>\r\n<li>MongoDB</li>\r\n<li>Redis</li>\r\n<li>MS Access</li>\r\n<li>SQL Lite</li>\r\n<li>Big Data</li>\r\n</ul>', 1, '2021-09-20 16:23:00', '2021-09-20 16:23:00'),
(8, 'Tools', '<ul>\r\n<li>TFS</li>\r\n<li>NUnit</li>\r\n<li>MS Unit Test</li>\r\n<li>NCover</li>\r\n<li>NAnt</li>\r\n<li>Jenkins</li>\r\n<li>Dev Ops</li>\r\n<li>Git</li>\r\n<li>SVN</li>\r\n<li>ClearCase</li>\r\n</ul>', 1, '2021-09-20 16:23:28', '2021-09-20 16:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `webex_queries`
--

CREATE TABLE `webex_queries` (
  `query_id` int NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `company` text COLLATE utf8mb4_general_ci,
  `message` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webex_queries`
--

INSERT INTO `webex_queries` (`query_id`, `name`, `email`, `phone`, `company`, `message`, `created_at`) VALUES
(1, 'Masih Haider', 'masi@zenwebnet.com', '07290803902', 'Zenwebnet', 'Testing webex query', '2021-09-18 15:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `why_chooses`
--

CREATE TABLE `why_chooses` (
  `id` bigint NOT NULL,
  `title` text COLLATE utf8mb4_general_ci,
  `description` longtext COLLATE utf8mb4_general_ci,
  `image` text COLLATE utf8mb4_general_ci,
  `slug` text COLLATE utf8mb4_general_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_chooses`
--

INSERT INTO `why_chooses` (`id`, `title`, `description`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Flexibility', 'Our model allows for quick mobilization and scalable engagement to address time-sensitive deliverables and suit every firm’s size, culture and requirements.', '1632138685-flexibility.png', 'flexibility', 1, '2021-09-17 16:59:39', '2021-09-20 17:21:25'),
(2, 'Experience', 'Our talent pool of subject matter experts keeps abreast of the industry development and technical know-how. Our joint efforts are channelled into ensuring the perpetual quality of services. By sourcing the brightest talent in the industry from a host of financial services firms, we have best-of-breed methodologies & processes and offer a near turn-key solution to our clients with unsurpassed quality', '1632137120-experience.png', 'experience', 1, '2021-09-17 17:00:34', '2021-09-20 16:55:20'),
(3, 'Lower Cost', 'Our strategically placed teams provide a pricing advantage that is passed through to our clients resulting in substantial savings for them. We enable you to fully leverage your onshore talent to focus on higher value-add analysis and revenue –generative opportunities.', '1632138423-cost.png', 'lower-cost', 1, '2021-09-20 16:17:17', '2021-09-20 17:17:03'),
(4, 'Integration', 'Our model allows for quick mobilization and scalable engagement to address time-sensitive deliverables and suit every firm’s size, culture and requirements.', '1632138344-integration.png', 'integration', 1, '2021-09-20 16:17:39', '2021-09-20 17:15:44'),
(5, 'Customization', 'All of our work is bespoke and the intellectual property is owned by our clients. Each engagement is customized and structured to match the client’s needs.', '1632138567-Customization.png', 'customization', 1, '2021-09-20 16:18:16', '2021-09-20 17:19:27'),
(6, 'Quality Assurance', 'Transparent and efficient service are hallmarks of our team and we have strong guidelines and processes in place to ensure that our clients receive services that are best in class.', '1632138628-quality.png', 'quality-assurance', 1, '2021-09-20 16:18:34', '2021-09-20 17:20:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_queries`
--
ALTER TABLE `career_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaderships`
--
ALTER TABLE `leaderships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `proposal_queries`
--
ALTER TABLE `proposal_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webex_queries`
--
ALTER TABLE `webex_queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `why_chooses`
--
ALTER TABLE `why_chooses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `career_queries`
--
ALTER TABLE `career_queries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leaderships`
--
ALTER TABLE `leaderships`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proposal_queries`
--
ALTER TABLE `proposal_queries`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `webex_queries`
--
ALTER TABLE `webex_queries`
  MODIFY `query_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_chooses`
--
ALTER TABLE `why_chooses`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
