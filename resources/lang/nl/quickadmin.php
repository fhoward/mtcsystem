<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'avatar' => 'Avatar',			'emp-id' => 'Employee id',			'name' => 'Full Name',			'email' => 'Email',			'password' => 'Password',			'confirm-password' => 'Confirm password',			'rfid-no' => 'Rfid no',			'role' => 'Role',			'remember-token' => 'Remember token',			'gender' => 'Gender',			'contact-no' => 'Contact no',			'profession' => 'Profession',			'prc-number' => 'Prc number',			'sss-id' => 'Sss id',			'tin-no' => 'Tin no',			'philhealth-id' => 'Philhealth id',			'guardian-name' => 'Guardian name',			'guardian-contact-no' => 'Guardian contact no',			'guardian-address' => 'Guardian address',		],	],
		'professions' => [		'title' => 'Professions',		'created_at' => 'Time',		'fields' => [			'profession' => 'Profession',		],	],
		'patients' => [		'title' => 'Patients',		'created_at' => 'Time',		'fields' => [			'assigned-therapist' => 'Assigned therapist',			'image' => 'Image',			'name' => 'Full Name',			'gender' => 'Gender',			'birthday' => 'Birthday',			'guardians-name' => 'Guardians name',			'contact-number' => 'Contact number',			'address' => 'Address',			'doctors-name' => 'Doctors name',			'remarks' => 'Remarks',			'file' => 'Other Files',		],	],
		'appointment-request' => [		'title' => 'Apppointment Request',		'created_at' => 'Time',		'fields' => [		],	],
		'contact-companies' => [		'title' => 'Companies',		'created_at' => 'Time',		'fields' => [			'name' => 'Company name',			'address' => 'Address',			'website' => 'Website',			'email' => 'Email',		],	],
		'contacts' => [		'title' => 'Contacts',		'created_at' => 'Time',		'fields' => [			'company' => 'Company',			'name' => 'Full Name',			'phone1' => 'Phone 1',			'email' => 'Email',			'address' => 'Address',			'date' => 'Date',		],	],
		'schedules' => [		'title' => 'Schedules',		'created_at' => 'Time',		'fields' => [			'staff' => 'Staff',			'patient' => 'Patient',			'activity' => 'Treatment',			'status' => 'Status',			'date' => 'Date',			'start' => 'Start Time',			'end' => 'End time',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
	'qa_create' => 'Toevoegen',
	'qa_save' => 'Opslaan',
	'qa_edit' => 'Bewerken',
	'qa_view' => 'Bekijken',
	'qa_update' => 'Bijwerken',
	'qa_list' => 'Lijst',
	'qa_no_entries_in_table' => 'Geen inhoud gevonden',
	'custom_controller_index' => 'Custom controller index.',
	'qa_logout' => 'Logout',
	'qa_add_new' => 'Toevoegen',
	'qa_are_you_sure' => 'Ben je zeker?',
	'qa_back_to_list' => 'Terug naar lijst',
	'qa_dashboard' => 'Boordtabel',
	'qa_delete' => 'Verwijderen',
	'quickadmin_title' => 'MTCfinal',
];