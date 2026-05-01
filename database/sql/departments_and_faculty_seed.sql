-- ============================================================
-- KMC College — Departments & Faculty Data
-- Run this in phpMyAdmin or MySQL CLI after deploying the app.
-- Step 1: Create departments table
-- Step 2: Clear & re-insert all departments
-- Step 3: Clear & re-insert all faculty
-- ============================================================

-- STEP 1: Create departments table (skip if already exists)
CREATE TABLE IF NOT EXISTS `departments` (
  `id`                  BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug`                VARCHAR(255) NOT NULL,
  `name`                VARCHAR(255) NOT NULL,
  `faculty_group`       VARCHAR(255) NOT NULL,
  `icon`                VARCHAR(255) NOT NULL DEFAULT 'fa-book',
  `color`               VARCHAR(255) NOT NULL DEFAULT 'blue',
  `established_year`    INT NULL,
  `about`               LONGTEXT NULL,
  `vision`              LONGTEXT NULL,
  `mission`             LONGTEXT NULL,
  `goals`               LONGTEXT NULL,
  `highlights`          LONGTEXT NULL,
  `programmes_offered`  LONGTEXT NULL,
  `intake_ug`           INT NULL,
  `intake_pg`           INT NULL,
  `has_phd`             TINYINT(1) NOT NULL DEFAULT 0,
  `hod_name`            VARCHAR(255) NULL,
  `is_active`           TINYINT(1) NOT NULL DEFAULT 1,
  `order`               INT NOT NULL DEFAULT 0,
  `created_at`          TIMESTAMP NULL,
  `updated_at`          TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Record in migrations table
INSERT IGNORE INTO `migrations` (`migration`, `batch`)
VALUES ('2026_05_01_000001_create_departments_table', (SELECT COALESCE(MAX(`batch`),0)+1 FROM `migrations` AS m2));

-- STEP 2: Departments data
TRUNCATE TABLE `departments`;

INSERT INTO `departments`
  (`slug`,`name`,`faculty_group`,`icon`,`color`,`established_year`,`about`,`vision`,`mission`,`goals`,`highlights`,`programmes_offered`,`intake_ug`,`intake_pg`,`has_phd`,`hod_name`,`is_active`,`order`,`created_at`,`updated_at`)
VALUES

('english','Department of English','arts','fa-book-open','blue',1979,
'The Department of English was established in 1979 with a mission to create passion for English amongst the learners and empowerment of successful communication, and to teach human values by learning world classics. The department offers undergraduate programmes in English up to the second year level and has two teaching staff. The department offers a "Basic English Grammar Certificate Course" and maintains a separate departmental library with textbooks and reference books made available to learners. The department arranges guest lectures by eminent personalities from various fields for enhancement of communication skills and organises various programmes and competitions. The department participates enthusiastically in all co-curricular and extra-curricular activities conducted by various committees of the college.',
'To create passion for English amongst learners and empower successful communication by teaching human values through world classics.',
'To provide quality education in English language and literature, fostering communication skills and appreciation for literary traditions.',
NULL,
'["Basic English Grammar Certificate Course","Separate departmental library with textbooks and reference books","Regular guest lectures by eminent personalities from various fields","Active participation in co-curricular and extra-curricular activities","Programmes and competitions for enhancement of communication skills"]',
'[{"class":"F.Y.B.A.","subject":"Communication Skills in English-I","type":"AEC","credits":2},{"class":"F.Y.B.A.","subject":"Introduction to Literatures in English-I","type":"Major\\/Minor","credits":4},{"class":"F.Y.B.Com","subject":"Business Communication Skills-I","type":"AEC","credits":2},{"class":"F.Y.B.Com","subject":"Indian Short Stories","type":"O.E.","credits":2},{"class":"F.Y.B.Sc","subject":"Introduction to Communication Skills in English-I","type":"AEC","credits":2},{"class":"S.Y.B.A.","subject":"Introduction to Forms of Literature: Drama","type":"Major\\/Minor","credits":4},{"class":"S.Y.B.A.","subject":"Introduction to Forms of Literature: Novel","type":"Major\\/Minor","credits":4},{"class":"S.Y.B.A.","subject":"Communication Skills in English-II","type":"AEC","credits":2}]',
NULL,NULL,0,'Dr. Ganpati Pandurang Mulik',1,1,NOW(),NOW()),

('marathi','Department of Marathi','arts','fa-feather-alt','orange',1983,
'The Department of Marathi was established in 1983. With a proud tradition of 43 years, the department continuously runs student-centric programmes for academic, research, cultural, and language skill development. The department was founded by litterateur and journalist Late Dr. Madhav Potdar, who was its first Head. Subsequently, Dr. Vinaya Bhandari and Prof. Mohan Ballal made valuable contributions to its progress. The department teaches Marathi language and literature papers for F.Y. and S.Y. Arts, Commerce, Science and Computer classes. T.Y.B.A. (Marathi Major) degree has six papers. Since 2024-25, under NEP, students from other streams can also study Marathi and related skills. The department has launched a "Journalism and Mass Communication Certificate Course" to provide career opportunities in media.',
'To create awareness among students that the study of language and literature is important for the overall development of human culture; to develop confidence that society\'s intellectual direction can be refined through the interrelationship of language, literature, culture and society; and to reveal the connection of Marathi language and literature study with other languages and knowledge disciplines.',
'To create responsible citizens through language and literature study; to provide awareness of the scope of language and literature study and career opportunities within it, thereby producing mature scholars, critics, artists, and researchers.',
'To create awareness of society and culture through literary study; to consolidate the directions of social equality and cultural development; to raise awareness and activism so that Marathi language becomes a language of knowledge; to develop linguistic skill capacity of students studying Marathi language and literature including translation, comparative literature, and writing skills for various media.',
'["Journalism and Mass Communication Certificate Course","Reading Inspiration Day, Marathi Language Fortnight, Marathi Language Pride Day","Author Visit Programme — Lekhak Aaplya Bhetila","Oratory and Writing Workshops","Guest lectures by eminent litterateurs, critics, and journalists","Students have won gold medals at university level in Marathi","Alumni working as professors, teachers, lawyers, journalists, and in government services"]',
'[{"class":"F.Y.B.A.","subject":"Marathi (Major)","type":"Major","credits":4},{"class":"F.Y.B.A.","subject":"Marathi AEC — Writing Skills for Print Media","type":"AEC","credits":2},{"class":"S.Y.B.A.","subject":"Marathi Major — Sem III & IV","type":"Major","credits":4},{"class":"S.Y.B.A.","subject":"Marathi AEC — Translation Skills","type":"AEC","credits":2},{"class":"S.Y.B.A.","subject":"Marathi VSC — Digitisation","type":"VSC","credits":2},{"class":"T.Y.B.A.","subject":"Marathi Major (6 papers)","type":"Major","credits":4}]',
NULL,NULL,0,'Dr. Bhausaheb M. Nannaware',1,2,NOW(),NOW()),

('economics','Department of Economics','arts','fa-chart-line','green',1979,
'The Department of Economics was established in 1979 with a vision to promote academic excellence and economic awareness among students. The department focuses on teaching Economics in a simple, practical, and research-oriented manner so that students can understand economic issues at local, national, and global levels. It provides opportunities for skill development through academic activities, seminars, workshops, and field-based learning. The department honours its former Heads Late Dr. B.D. Bansode, Late Prof. R.P. Kothawale (author of Maharashtra\'s First Economics SET guidance book) and Dr. V.S. Kulkarni, whose legacy continues to inspire. The department also supports students in building careers in higher education, banking, finance, corporate sectors, entrepreneurship, and public services.',
'To promote academic excellence and economic awareness so that students can understand economic issues at local, national, and global levels.',
'To teach Economics in a simple, practical, and research-oriented manner while providing skill development through seminars, workshops, and field-based learning.',
NULL,
'["Share market training and financial literacy sessions for students","Field visits, on-job training, and project-based learning","Mr. Rupesh Shid — NET-JRF qualified, currently pursuing Ph.D. at IIT Bombay","Faculty research published in international journals","BCUD, University of Mumbai funded research projects","Innovative use of presentations, group discussions, and case studies","NEP 2020 compliant — multidisciplinary and skill-based learning"]',
'[{"class":"F.Y.B.A.","subject":"Economics (Major)","type":"Major","credits":4},{"class":"F.Y.B.A.","subject":"VSC Economics","type":"VSC","credits":2},{"class":"F.Y.B.A.","subject":"SEC Economics","type":"SEC","credits":2},{"class":"F.Y.B.Sc\\/B.Com\\/BBI\\/BAF","subject":"OE Economics","type":"Open Elective","credits":2},{"class":"S.Y.B.A.","subject":"Economics (Major) Sem III & IV","type":"Major","credits":4},{"class":"T.Y.B.A.","subject":"Economics (Major)","type":"Major","credits":4}]',
NULL,NULL,0,'Mr. Sanjay Rama Dayare',1,3,NOW(),NOW()),

('sociology-rural-studies','Department of Sociology & Rural Studies','arts','fa-users','teal',1988,
'The Sociology & Rural Studies Department at KMC College, Khopoli, was established in 1988 with the vision of providing students with a deep understanding of the socio-cultural and economic realities of rural India. The department focuses on equipping students with the knowledge and skills needed to analyse and address the challenges faced by rural communities, along with the broader dynamics of society. Over the years, it has become an essential academic pillar for students seeking to engage with rural development and social issues. The department is equipped with a well-stocked library, offering books, journals, and research papers on sociology and rural studies. It regularly organises seminars, workshops, and guest lectures to engage students with current research trends and practices.',
'To develop well-rounded individuals who can contribute to the development and transformation of rural societies through informed actions and interventions.',
'To provide high-quality education that blends theoretical knowledge with practical insights, fostering critical thinking and analytical skills to prepare students for careers in social work, rural development, policy-making, and academia.',
NULL,
'["Fieldwork in rural surveys, community projects, and rural development programs","Social awareness programs, cultural events, debates, and rural development initiatives","Regular seminars, workshops, and guest lectures on contemporary research","Departmental library with books, journals, and research papers","Hands-on approach to understanding practical challenges of rural areas","Students develop leadership skills and social responsibility"]',
'[{"class":"F.Y.B.A.","subject":"Sociology","type":"Minor","credits":4},{"class":"F.Y.B.A.","subject":"Rural Studies","type":"Minor","credits":4},{"class":"F.Y.B.Com","subject":"Rural Studies","type":"Open Elective","credits":2},{"class":"S.Y.B.A.","subject":"Sociology","type":"Minor","credits":4},{"class":"S.Y.B.A.","subject":"Rural Studies","type":"Minor","credits":4}]',
NULL,NULL,0,'Dr. Vilas K. Magar',1,4,NOW(),NOW()),

('psychology','Department of Psychology','arts','fa-brain','purple',NULL,
'The Department of Psychology at KMC College is the only grant-aided undergraduate Psychology department in Raigad district. Students can study Psychology and earn a degree here. Over the years, respected principals and professors such as Late Principal S.S. Bhosale, Late Prof. Umbardand, Vice-Principal Prof. Annasaheb Kore, Principal Dr. Narendra Pawar, and Late Prof. S.K. Kanekar have all contributed to the growth of the department. In today\'s world, student mental health is very important. To support this, the department organises activities like counseling, expert lectures (both online and offline), poster presentations, and visits to mental hospitals. These experiences give students practical knowledge and help them connect classroom learning with real-life psychology. With technology growing fast, new areas like online therapy platforms, counseling apps, and artificial intelligence in mental health are opening up.',
'To provide quality psychology education that bridges academic knowledge with practical application, supporting student mental health and preparing graduates for diverse careers.',
'To offer the only grant-aided undergraduate psychology programme in Raigad district, equipping students with theoretical knowledge and practical skills through counseling sessions, expert lectures, and field experiences.',
NULL,
'["Only grant-aided UG Psychology department in Raigad district","Counseling sessions for student mental health support","Expert lectures (online and offline) by eminent psychologists","Poster presentation activities for applied learning","Visits to mental hospitals for practical exposure","Career opportunities in counseling, therapy, corporate HR, research, and NGOs"]',
'[{"class":"F.Y.B.A.","subject":"Psychology (Major)","type":"Major","credits":4},{"class":"S.Y.B.A.","subject":"Psychology (Major) Sem III & IV","type":"Major","credits":4},{"class":"T.Y.B.A.","subject":"Psychology (Major)","type":"Major","credits":4}]',
NULL,NULL,0,'Asst. Prof. Bhise S. A.',1,5,NOW(),NOW()),

('commerce','Department of Commerce','commerce','fa-briefcase','indigo',1979,
'The Department of Commerce at KMC College, established in 1979, has consistently upheld a tradition of academic excellence and holistic development. Since its inception, the department has played a pivotal role in shaping competent commerce graduates equipped with both theoretical knowledge and practical insights. It began its journey with the Bachelor of Commerce (B.Com) programme, laying a strong foundation in core areas such as Accountancy, Economics, and Business Management. Recognizing the need for advanced learning and specialization, the department introduced the Master of Commerce (M.Com) programme in Advanced Accountancy in 2004, thereby creating opportunities for higher education and research-oriented learning. In alignment with its vision to promote research and innovation, the department established a Ph.D. Research Centre in Commerce (Business Policy and Administration) in the academic year 2024-25. Currently, three research scholars are actively pursuing their doctoral studies. Further strengthening its academic offerings, the department introduced professional undergraduate programmes such as Bachelor of Accounting and Finance (BAF) and Bachelor of Banking and Insurance (BBI) in the academic year 2025-26. Notably, 04 alumni have qualified prestigious NET/SET examinations, 05 have become Chartered Accountants, and several others hold responsible positions in banks, financial institutions, corporate organizations, and various industries. Dr. Vinayak R. Gandal has published a patent: "Blockchain Integrated Computing System For Tamper Resistant Data Management" (Application No: 202641003798, Published 13th Feb 2026).',
'To nurture future leaders, entrepreneurs, and researchers who can contribute meaningfully to the economy and society at large through academic rigor, research orientation, skill development, and professional ethics.',
'To provide a strong foundation in commerce education blending theoretical knowledge with practical skills, fostering a culture of research, innovation, and professional excellence.',
NULL,
'["M.Com. in Advanced Accountancy introduced in 2004","Ph.D. Research Centre in Commerce (Business Policy & Administration) established 2024-25","BAF and BBI programmes introduced 2025-26","4 alumni qualified NET/SET; 5 alumni qualified as Chartered Accountants","Indian Patent published: Blockchain Data Management System (Feb 2026)","3 BCUD, University of Mumbai funded research projects","Faculty publications in Scopus-indexed and UGC-listed journals"]',
'[{"class":"F.Y.\\/S.Y.\\/T.Y.","subject":"Bachelor of Commerce (B.Com)","type":"UG","credits":null},{"class":"F.Y.\\/S.Y.\\/T.Y.","subject":"Bachelor of Accounting & Finance (BAF)","type":"UG","credits":null},{"class":"F.Y.\\/S.Y.\\/T.Y.","subject":"Bachelor of Banking & Insurance (BBI)","type":"UG","credits":null},{"class":"Sem I-IV","subject":"M.Com. in Advanced Accountancy","type":"PG","credits":null},{"class":"Research","subject":"Ph.D. in Commerce (Business Policy & Administration)","type":"Ph.D.","credits":null}]',
120,20,1,'Dr. Vinayak R. Gandal',1,6,NOW(),NOW()),

('chemistry','Department of Chemistry','science','fa-flask','red',1979,
'The Department of Chemistry started in 1979, since the establishment of K.M.C. College. It is one of the largest departments of the college. In its history of 46 years, it has grown considerably. The department is located on the ground floor of Building #2 and has three spacious laboratories. The department offers quality education to students from F.Y.B.Sc. up to post-graduation and Ph.D. The intake capacity of the undergraduate class is 120. The department has two postgraduate programmes — M.Sc. (Organic Chemistry) and M.Sc. (Inorganic Chemistry), with an intake capacity of 10 students for each programme. The Department also offers a Ph.D. (Chemistry) programme with an intake capacity of 6 students. The research laboratory, funded by DST-FIST, is located on the second floor and equipped with Infrared Spectrometer (Shimadzu), Double Beam UV-Visible Spectrophotometer (Shimadzu), Rotary Evaporator (Buchi), and other instruments. These were purchased from a grant received from the Department of Science & Technology (Govt. of India) under the FIST scheme. Presently, four faculty members are recognized guides for Ph.D. (Chemistry) from the University of Mumbai. All faculty are actively involved in research and publish in Scopus-indexed journals of Wiley, Elsevier, Springer, RSC, etc.',
'To provide quality chemistry education from undergraduate to Ph.D. level, driven by research and equipped with modern instrumentation to contribute to science and society.',
'To nurture students through rigorous academic programmes and state-of-the-art research facilities, producing scholars who can contribute meaningfully to chemistry and allied fields.',
NULL,
'["DST-FIST funded research laboratory with IR Spectrometer, UV-Vis Spectrophotometer and Rotary Evaporator","Three spacious laboratories for UG practical training","M.Sc. Organic Chemistry and M.Sc. Inorganic Chemistry (intake: 10 each)","Ph.D. programme with intake of 6 students; 4 faculty recognized as Ph.D. guides","Research publications in Wiley, Elsevier, Springer, RSC Scopus-indexed journals","UG intake of 120 students; one of the largest departments of the college"]',
'[{"class":"F.Y.\\/S.Y.B.Sc.","subject":"B.Sc. Chemistry (Major)","type":"UG Major","credits":null},{"class":"F.Y.\\/S.Y.B.Sc.","subject":"B.Sc. Chemistry (Minor)","type":"UG Minor","credits":null},{"class":"F.Y.B.A.\\/B.Com.","subject":"OE Chemistry","type":"Open Elective","credits":null},{"class":"Sem I-IV","subject":"M.Sc. Organic Chemistry","type":"PG","credits":null},{"class":"Sem I-IV","subject":"M.Sc. Inorganic Chemistry","type":"PG","credits":null},{"class":"Research","subject":"Ph.D. in Chemistry","type":"Ph.D.","credits":null}]',
120,20,1,'Dr. Ashokrao B. Patil',1,7,NOW(),NOW()),

('physics','Department of Physics','science','fa-atom','sky',1979,
'The Department of Physics at KMC College has been a cornerstone of academic excellence since its inception in 1979, established concurrently with the college itself. Founded by the visionary Head, Prof. L.D. Jundhale, the department has consistently strived to foster a deep understanding and appreciation for the fundamental principles of physics. The department currently has two permanent faculty members and two ad-hoc faculty members, under the leadership of Dr. Deepak Gaikwad (Head UG) and Dr. Revanappa C. Ambar (Head PG). The department offers comprehensive B.Sc. and M.Sc. programmes affiliated with the University of Mumbai. The intake capacity of the undergraduate class is 120. The M.Sc. Physics programme has an intake of 20 students. An application for a Ph.D. programme has been submitted and is anticipated to receive approval. Dr. Revanappa C. Ambar works on Supercapacitor, Gas Sensor, Dye Sensitized Solar Cells, Water splitting, Lithium-ion, Sodium-ion and Sulfur-based batteries, nanomaterials, energy modeling, thin film deposition, materials characterisation, photovoltaic cells, and DFT calculation. All faculty are actively involved in research and publish in Scopus-indexed journals of Wiley, Elsevier, Springer, RSC, etc.',
'To foster deep understanding and appreciation for the fundamental principles of physics, advancing research and higher education opportunities for aspiring physicists.',
'To deliver comprehensive B.Sc. and M.Sc. programmes while actively contributing to research in emerging areas of physics including nanomaterials, energy storage, and photovoltaic technologies.',
NULL,
'["M.Sc. Physics programme (intake: 20 students) affiliated to University of Mumbai","Ph.D. programme application submitted to University of Mumbai","Research in supercapacitors, nanomaterials, solar cells, and energy storage by Dr. R.C. Ambar","International and national patents registered by faculty","Publications in Scopus-indexed journals — Wiley, Elsevier, Springer, RSC","UG intake of 120 students; department founded by Prof. L.D. Jundhale (1979)"]',
'[{"class":"F.Y.\\/S.Y.B.Sc.","subject":"B.Sc. Physics (Major)","type":"UG Major","credits":null},{"class":"F.Y.\\/S.Y.B.Sc.","subject":"B.Sc. Physics (Minor)","type":"UG Minor","credits":null},{"class":"F.Y.B.Sc.","subject":"Wonders of Physics (OE)","type":"Open Elective","credits":null},{"class":"S.Y.B.Sc.","subject":"Astronomy and Space Missions (OE)","type":"Open Elective","credits":null},{"class":"S.Y.B.Sc.","subject":"Physics in Sports (OE)","type":"Open Elective","credits":null},{"class":"Sem I-IV","subject":"M.Sc. Physics","type":"PG","credits":null}]',
120,20,0,'Dr. Deepak Gaikwad',1,8,NOW(),NOW());

-- STEP 3: Faculty data
TRUNCATE TABLE `faculty_members`;

INSERT INTO `faculty_members`
  (`name`,`designation`,`department`,`qualification`,`specialization`,`email`,`phone`,`photo`,`bio`,`experience_years`,`is_active`,`order`,`created_at`,`updated_at`)
VALUES

-- ENGLISH
('Dr. Ganpati Pandurang Mulik','Assistant Professor & Head','english','M.A., M.Phil., Ph.D.','English Literature & Communication',NULL,NULL,NULL,NULL,0,1,1,NOW(),NOW()),
('Mrs. Meenakshi D. Oswal','Assistant Professor','english','M.A.','English Literature',NULL,NULL,NULL,NULL,0,1,2,NOW(),NOW()),

-- MARATHI
('Dr. Bhausaheb M. Nannaware','Head & Associate Professor','marathi','M.A., NET, B.Ed., Ph.D., MCJ','Marathi Literature & Journalism',NULL,NULL,'documents/fwdmarathidept_informationforcollegewebsite202627/1. Dr. B. M. Nannawre - Photo.jpeg',NULL,0,1,1,NOW(),NOW()),
('Mrs. Priya M. Nerlekar','Assistant Professor','marathi','M.A., NET, SET','Marathi Literature',NULL,NULL,'documents/fwdmarathidept_informationforcollegewebsite202627/2. Prof.Priya Nerlekar Mar.Dept..jpeg',NULL,0,1,2,NOW(),NOW()),
('Dr. Pratibha S. Tembe','Assistant Professor','marathi','M.A., SET, Ph.D.','Marathi Literature',NULL,NULL,'documents/fwdmarathidept_informationforcollegewebsite202627/3. Dr. Prathibha S. Tembe Mar.Dept..jpeg',NULL,0,1,3,NOW(),NOW()),

-- ECONOMICS
('Mr. Sanjay Rama Dayare','Assistant Professor & Head of Department','economics','M.A., NET, SET, B.Ed.','Economics, Environmental Economics, Higher Education Finance',NULL,NULL,NULL,'Worked as Research Assistant with Prof. Dr. Neeraj Hatekar and Prof. Dr. Satyanarayan Kothe of Mumbai School of Economics and Public Policy, University of Mumbai, for the Panvel Municipal Corporation Environmental Reports (2018–2021). Completed a BCUD-funded project on the Khopoli Municipal Council Environmental Report. Has published research papers in international journals and contributed to the First-Year Economics textbook of the University of Mumbai.',0,1,1,NOW(),NOW()),
('Dr. Pratik Sasane','Assistant Professor','economics','M.A., Ph.D.','Economics',NULL,NULL,NULL,NULL,0,1,2,NOW(),NOW()),
('Mr. Kamalakar M. Hirawa','Assistant Professor','economics','M.A., SET','Economics, Infrastructure Development',NULL,NULL,NULL,NULL,0,1,3,NOW(),NOW()),
('Miss. Rutuja C. Hojage','Assistant Professor','economics','M.A., SET','Economics',NULL,NULL,NULL,NULL,0,1,4,NOW(),NOW()),
('Miss. Riya Jackson','Assistant Professor','economics','M.A., B.Ed.','Economics',NULL,NULL,NULL,NULL,0,1,5,NOW(),NOW()),

-- SOCIOLOGY & RURAL STUDIES
('Dr. Vilas K. Magar','Assistant Professor & Head','sociology-rural-studies','M.A., NET, M.Phil., Ph.D.','Sociology, Rural Development, Social Policy',NULL,NULL,'documents/fwddearsir/Dr.V.K.Magar Photo.jpg',NULL,0,1,1,NOW(),NOW()),

-- PSYCHOLOGY
('Asst. Prof. Bhise S. A.','Assistant Professor & Head','psychology','M.A., M.Phil., NET','Psychology, Counseling',NULL,NULL,'documents/fwdaboutthepsychologydept_/Bhise photo_page-0001.jpg',NULL,0,1,1,NOW(),NOW()),
('Asst. Prof. Ruthe R. D.','Assistant Professor','psychology','M.A., RCI Registered Diploma in Counselling','Counselling Psychology',NULL,NULL,'documents/fwdaboutthepsychologydept_/Ruthe _page-0001.jpg',NULL,0,1,2,NOW(),NOW()),
('Asst. Prof. Dharpawar Sneha Vishwanath','Assistant Professor','psychology','M.A.','Psychology',NULL,NULL,'documents/fwdaboutthepsychologydept_/Sneha_page-0001.jpg',NULL,0,1,3,NOW(),NOW()),

-- COMMERCE
('Dr. Vinayak R. Gandal','Associate Professor & Head','commerce','M.Com., M.B.A., NET, Ph.D.','Commerce, Finance, Security Industry, Consumer Behaviour',NULL,NULL,NULL,'Has published over 20 research papers in international journals, 3 books (LAP Lambert Germany, Ramanshil Publication, Success Publication), and holds an Indian Patent (Application No: 202641003798). Completed 2 BCUD, University of Mumbai funded research projects.',0,1,1,NOW(),NOW()),
('Mr. Sunil N. Waghmare','Assistant Professor','commerce','M.Com., B.Ed., NET','Commerce',NULL,NULL,NULL,NULL,0,1,2,NOW(),NOW()),
('Ms. Shraddha N. Padwal','Assistant Professor','commerce','M.Com., B.Ed.','Commerce',NULL,NULL,NULL,NULL,0,1,3,NOW(),NOW()),
('Ms. Pooja Yadav','Assistant Professor','commerce','M.Com., Dip. MCJ','Commerce, Mass Communication',NULL,NULL,NULL,NULL,0,1,4,NOW(),NOW()),
('Ms. Yogita Sonawane','Assistant Professor','commerce','M.Com., B.Ed.','Commerce',NULL,NULL,NULL,NULL,0,1,5,NOW(),NOW()),
('Mr. Nandkumar Mali','Assistant Professor','commerce','M.Com., SET, NET','Commerce',NULL,NULL,NULL,NULL,0,1,6,NOW(),NOW()),
('Mr. Kuldeep Chavhan','Assistant Professor','commerce','M.Com., B.Ed., SET, MA(ECO), LLB','Commerce, Law, Economics',NULL,NULL,NULL,NULL,0,1,7,NOW(),NOW()),
('Ms. Reshma Hajare','Assistant Professor','commerce','M.Com.','Commerce',NULL,NULL,NULL,NULL,0,1,8,NOW(),NOW()),
('Ms. Riya Jackson Mangan','Assistant Professor (Business Economics)','commerce','M.A. (Eco), B.Ed.','Business Economics',NULL,NULL,NULL,NULL,0,1,9,NOW(),NOW()),

-- CHEMISTRY
('Dr. Vikas B. Suryawanshi','Professor & Vice Principal','chemistry','M.Sc., M.Phil., B.Ed., Ph.D.','Chemistry',NULL,NULL,NULL,NULL,0,1,1,NOW(),NOW()),
('Dr. Sharad P. Panchgalle','Associate Professor','chemistry','M.Sc., NET, SET, Ph.D.','Chemistry',NULL,NULL,'documents/fwddepartmentofchemistryinformationandphotos/SPP.JPG',NULL,0,1,2,NOW(),NOW()),
('Dr. Ashokrao B. Patil','Associate Professor & Head (UG)','chemistry','M.Sc., B.Ed., Ph.D.','Chemistry',NULL,NULL,NULL,NULL,0,1,3,NOW(),NOW()),
('Dr. Amol A. Nagargoje','Associate Professor','chemistry','M.Sc., NET, Ph.D.','Chemistry',NULL,NULL,'documents/fwddepartmentofchemistryinformationandphotos/AAN.jpeg',NULL,0,1,4,NOW(),NOW()),
('Mr. Shailesh A. Shivade','Assistant Professor & Head (PG)','chemistry','M.Sc., NET, SET, GATE','Chemistry',NULL,NULL,'documents/fwddepartmentofchemistryinformationandphotos/Shailesh A. Shivade.png',NULL,0,1,5,NOW(),NOW()),
('Ms. Pinki M. Sharma','Assistant Professor','chemistry','M.Sc., NET, SET','Chemistry',NULL,NULL,'documents/fwddepartmentofchemistryinformationandphotos/Pinki M. Sharma photo.jpeg',NULL,0,1,6,NOW(),NOW()),
('Ms. Nargees M. Kharkar','Assistant Professor','chemistry','M.Sc., B.Ed.','Chemistry',NULL,NULL,'documents/fwddepartmentofchemistryinformationandphotos/Nargees Kharkar photo.jpeg',NULL,0,1,7,NOW(),NOW()),
('Ms. Vaishnavi P. Khandekar','Assistant Professor','chemistry','M.Sc.','Chemistry',NULL,NULL,NULL,NULL,0,1,8,NOW(),NOW()),
('Ms. Mushira Khan','Assistant Professor','chemistry','M.Sc.','Chemistry',NULL,NULL,NULL,NULL,0,1,9,NOW(),NOW()),
('Ms. Nuren Shikalgar','Assistant Professor','chemistry','M.Sc.','Chemistry',NULL,NULL,NULL,NULL,0,1,10,NOW(),NOW()),

-- PHYSICS
('Dr. Deepak Gaikwad','Associate Professor & Head (UG)','physics','M.Sc., Ph.D.','Physics',NULL,NULL,NULL,NULL,0,1,1,NOW(),NOW()),
('Dr. Revanappa C. Ambar','Assistant Professor & Head (PG)','physics','M.Sc., Ph.D.','Nanomaterials, Energy Storage, Supercapacitors, Photovoltaics, DFT',NULL,NULL,'documents/fwddepartmentofphysics/Dr. R C Ambare - Photo.jpg','Working on Supercapacitor, Gas Sensor, Dye Sensitized Solar Cells, Water splitting, Lithium-ion, Sodium-ion and Sulfur-based batteries, nanomaterials, energy modeling, thin film deposition, materials characterisation, photovoltaic cells, and DFT calculation. Has numerous publications in high-impact factor journals and several international and national patents. Ph.D. guide from Department of Physics, University of Mumbai; two students registered for Ph.D. under his supervision.',0,1,2,NOW(),NOW()),
('Ms. Aparna More','Assistant Professor','physics','M.Sc., SET','Physics',NULL,NULL,'documents/fwddepartmentofphysics/Ms. Aparana More (Photo).jpeg',NULL,0,1,3,NOW(),NOW()),
('Ms. Snehal Kambali','Assistant Professor','physics','M.Sc., SET','Physics',NULL,NULL,'documents/fwddepartmentofphysics/Ms. Snehal Kambali (Photo).jpeg',NULL,0,1,4,NOW(),NOW());

-- Done!
SELECT 'Departments inserted:' AS '', COUNT(*) AS count FROM `departments`;
SELECT 'Faculty inserted:' AS '', COUNT(*) AS count FROM `faculty_members`;
