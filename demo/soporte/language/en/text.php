<?php
/*
* Language file for Help Desk Software HESK (www.hesk.com)
* Language: ENGLISH
* Version: 2.6.3
* Author: Klemen Stirn (http://www.hesk.com)
*
* !!! This file must be saved in UTF-8 encoding without byte order mark (BOM) !!!
* Test chars: àáâãäåæ
*/

// Change "English" to the name of your language
$hesklang['LANGUAGE']='English';

// Language encoding. It MUST be set to UTF-8 for all languages!
$hesklang['ENCODING']='UTF-8';

// MySQL utf8 collation. Do not change if not sure what to use.
$hesklang['_COLLATE']='utf8_unicode_ci';

// This is the email break line that will be used in email piping
$hesklang['EMAIL_HR']='------ Reply above this line ------';

// EMAIL SUBJECTS
$hesklang['new_ticket_staff']       = '[#%%TRACK_ID%%] New ticket: %%SUBJECT%%';
$hesklang['ticket_received']        = '[#%%TRACK_ID%%] Ticket received: %%SUBJECT%%';
$hesklang['ticket_assigned_to_you'] = '[#%%TRACK_ID%%] Ticket assigned: %%SUBJECT%%';
$hesklang['new_reply_by_customer']  = '[#%%TRACK_ID%%] New reply to: %%SUBJECT%%';
$hesklang['new_reply_by_staff']     = '[#%%TRACK_ID%%] New reply to: %%SUBJECT%%';
$hesklang['category_moved']         = '[#%%TRACK_ID%%] Ticket moved: %%SUBJECT%%';
$hesklang['new_note']               = '[#%%TRACK_ID%%] Note added to: %%SUBJECT%%';
$hesklang['new_pm']                 = 'New private message: %%SUBJECT%%';
$hesklang['forgot_ticket_id']       = 'List of your support tickets';
$hesklang['ticket_closed']			= '[#%%TRACK_ID%%] Ticket closed/resolved'; // New in 2.6.0

// ERROR MESSAGES
$hesklang['cant_connect_db']='Can\'t connect to database!';
$hesklang['invalid_action']='Invalid action';
$hesklang['select_username']='Please select your username';
$hesklang['enter_pass']='Please enter your password';
$hesklang['cant_sql']='Can\'t execute SQL';
$hesklang['contact_webmsater']='Please notify webmaster at';
$hesklang['mysql_said']='MySQL said';
$hesklang['wrong_pass']='Wrong password.';
$hesklang['session_expired']='Your session has expired, please login using the form below.';
$hesklang['attempt']='Invalid attempt!';
$hesklang['not_authorized_tickets']='You are not authorized to view tickets inside this category!';
$hesklang['must_be_admin']='You are not authorized to view this page! To view this page you must be logged in as an administrator.';
$hesklang['no_session']='Can\'t start a new session!';
$hesklang['error']='Error';
$hesklang['int_error']='Internal script error';
$hesklang['no_trackID']='No tracking ID';
$hesklang['status_not_valid']='Status not valid';
$hesklang['trackID_not_found']='Tracking ID not found';
$hesklang['select_priority']='Please select priority';
$hesklang['ticket_not_found']='Ticket not found! Please make sure you have entered the correct tracking ID!';
$hesklang['no_selected']='No tickets selected, nothing to change';
$hesklang['id_not_valid']='This is not a valid ID';
$hesklang['enter_id']='Please enter tracking ID';
$hesklang['enter_name']='Please enter customer name';
$hesklang['enter_date']='Please enter the date you want to search in';
$hesklang['date_not_valid']='This is not a valid date. Please enter date in <b>YYYY-MM-DD</b> format.';
$hesklang['enter_subject']='Please enter ticket subject';
$hesklang['invalid_search']='Invalid search action';
$hesklang['choose_cat_ren']='Please choose a category to be renamed';
$hesklang['cat_ren_name']='Please write new category name';
$hesklang['cat_not_found']='Category not found';
$hesklang['enter_cat_name']='Please enter category name';
$hesklang['no_cat_id']='No category ID';
$hesklang['cant_del_default_cat']='You cannot delete the default category, you can only rename it';
$hesklang['no_valid_id']='No valid user ID';
$hesklang['user_not_found']='User not found';
$hesklang['enter_real_name']='Please enter user real name';
$hesklang['enter_valid_email']='Please enter a valid email address';
$hesklang['enter_username']='Please enter username (login)';
$hesklang['asign_one_cat']='Please assign user to at least one category!';
$hesklang['confirm_user_pass']='Please confirm password';
$hesklang['passwords_not_same']='The two passwords entered are not the same!';
$hesklang['cant_del_admin']='You cannot delete the default administrator!';
$hesklang['cant_del_own']='You cannot delete the profile you are logged in as!';
$hesklang['enter_your_name']='Please enter your name';
$hesklang['enter_message']='Please enter your message';
$hesklang['sel_app_cat']='Please select the appropriate category';
$hesklang['sel_app_priority']='Please select the appropriate priority';
$hesklang['enter_ticket_subject']='Please enter your ticket subject';
$hesklang['user_not_found_nothing_edit']='User not found or nothing to change';

// ADMIN PANEL
$hesklang['administrator']='Administrator';
$hesklang['login']='Login';
$hesklang['user']='User';
$hesklang['username']='Username';
$hesklang['pass']='Password';
$hesklang['confirm_pass']='Confirm password';
$hesklang['logged_out']='Logged out';
$hesklang['logout']='Logout';
$hesklang['logout_success']='You have been successfully logged out!';
$hesklang['click_login']='Click here to login';
$hesklang['back']='Go back';
$hesklang['displaying_pages']='Displaying <b>%d</b> tickets. Pages:';
$hesklang['trackID']='Tracking ID';
$hesklang['timestamp']='Timestamp';
$hesklang['name']='Name';
$hesklang['subject']='Subject';
$hesklang['status']='Status';
$hesklang['priority']='Priority';
$hesklang['open_action']='Open ticket'; // Open ACTION
$hesklang['close']='Closed'; // Closed ticket STATUS
$hesklang['any_status']='Any status';
$hesklang['high']='High';
$hesklang['medium']='Medium';
$hesklang['low']='Low';
$hesklang['del_selected']='Delete selected tickets';
$hesklang['manage_cat']='Manage categories';
$hesklang['profile']='Your profile';
$hesklang['show_tickets']='Show tickets';
$hesklang['sort_by']='Sort by';
$hesklang['date_posted']='Date posted';
$hesklang['category']='Category';
$hesklang['any_cat']='Any category';
$hesklang['order']='Order';
$hesklang['ascending']='ascending';
$hesklang['descending']='descending';
$hesklang['display']='Display';
$hesklang['tickets_page']='tickets per page';
$hesklang['find_ticket']='Find ticket';
$hesklang['yyyy_mm_dd']='YYYY-MM-DD';
$hesklang['results_page']='results per page';
$hesklang['opened']='opened'; // The ticket has been OPENED
$hesklang['ticket']='Ticket';
$hesklang['tickets']='Tickets';
$hesklang['ticket_been']='This ticket has been';
$hesklang['view_ticket']='View ticket';
$hesklang['open_tickets']='Open tickets';
$hesklang['remove_statement']='Remove &quot;Powered by&quot; statement';
$hesklang['click_info']='Click here for more info';
$hesklang['reply_added']='Reply added';
$hesklang['ticket_marked']='This ticket has been marked';
$hesklang['ticket_status']='Ticket status';
$hesklang['replies']='Replies';
$hesklang['date']='Date';
$hesklang['email']='Email';
$hesklang['ip']='IP';
$hesklang['message']='Message';
$hesklang['add_reply']='Add reply';
$hesklang['change_priority']='Change priority to';
$hesklang['attach_sign']='Attach signature';
$hesklang['profile_settings']='Profile settings';
$hesklang['submit_reply']='Submit reply';
$hesklang['support_panel']='Support panel';
$hesklang['ticket_trackID']='Ticket tracking ID';
$hesklang['c2c']='Click to continue';
$hesklang['tickets_deleted']='Tickets deleted';
$hesklang['num_tickets_deleted']='<b>%d</b> tickets have been deleted';
$hesklang['found_num_tickets']='Found <b>%d</b> tickets. Pages:';
$hesklang['confirm_del_cat']='Are you sure you want to remove this category?';
$hesklang['cat_intro']='Here you are able to manage categories. Categories are useful
for categorizing tickets by relevance (for example &quot;Sales&quot;,
&quot;Hardware problems&quot;, &quot;PHP/MySQL problems&quot; etc) and for
assigning users to categories (for example that your sales person can only view
tickets posted to &quot;Sales&quot; category)';
$hesklang['cat_name']='Category name';
$hesklang['remove']='Remove';
$hesklang['add_cat']='Add new category';
$hesklang['max_chars']='max 40 chars';
$hesklang['create_cat']='Create category';
$hesklang['ren_cat']='Rename category';
$hesklang['to']='to';
$hesklang['cat_added']='Category added';
$hesklang['cat_name_added']='Category %s has been successfully added';
$hesklang['cat_renamed']='Category renamed';
$hesklang['cat_renamed_to']='Selected category has been successfully renamed to';
$hesklang['cat_removed']='Category removed';
$hesklang['cat_removed_db']='Selected category has been successfully removed from the database';
$hesklang['sure_remove_user']='Are you sure you want to remove this user?';
$hesklang['manage_users']='Manage users';
$hesklang['users_intro']='Here you are able to manage users who can login to the admin panel and
answer tickets. Administrators can view/edit tickets in any category and have access
to all functions of the admin panel (manage users, manage categories, ...) while
other users may only view and reply to tickets within their categories.';
$hesklang['yes']='YES';
$hesklang['no']='NO';
$hesklang['edit']='Edit';
$hesklang['add_user']='Add new user';
$hesklang['req_marked_with']='Required fields are marked with';
$hesklang['real_name']='Real name';
$hesklang['sign_extra']='HTML code is not allowed. Links will be clickable.';
$hesklang['create_user']='Create user';
$hesklang['editing_user']='Editing user';
$hesklang['user_added']='User added';
$hesklang['user_added_success']='New user %s with password %s has been successfully added';
$hesklang['user_removed']='User removed';
$hesklang['sel_user_removed']='Selected user has been successfully removed from the database';
$hesklang['profile_for']='Profile for';
$hesklang['new_pass']='New password';
$hesklang['update_profile']='Update profile';
$hesklang['notify_new_posts']='Notify me of new tickets and posts within my categories';
$hesklang['profile_updated']='Profile updated';
$hesklang['profile_updated_success']='This profile has been successfully updated';
$hesklang['view_profile']='View profile';
$hesklang['new_ticket_submitted']='New support ticket submitted';
$hesklang['user_profile_updated_success']='This user profile has been updated successfully';
$hesklang['printer_friendly']='Printer friendly version';
$hesklang['end_ticket']='--- End of ticket ---';

// CUSTOMER INTERFACE
$hesklang['your_ticket_been']='Your ticket has been';
$hesklang['submit_ticket']='Submit a ticket';
$hesklang['sub_ticket']='Submit ticket';
$hesklang['before_submit']='Before submitting please make sure of the following';
$hesklang['all_info_in']='All necessary information has been filled out';
$hesklang['all_error_free']='All information is correct and error-free';
$hesklang['we_have']='We have';
$hesklang['recorded_ip']='recorded as your IP Address';
$hesklang['recorded_time']='recorded the time of your submission';
$hesklang['save_changes']='Save changes';
$hesklang['reply_submitted']='Reply submitted';
$hesklang['reply_submitted_success']='Your reply to this ticket has been successfully submitted';
$hesklang['view_your_ticket']='View your ticket';
$hesklang['ticket_submitted']='Ticket submitted';
$hesklang['ticket_submitted_success']='Your ticket has been successfully submitted! Ticket ID';
$hesklang['your_ticket']='Your ticket';


// ADDED IN HESK VERSION 0.94
$hesklang['check_updates']='Make sure you always have installed the latest version of Hesk!';
$hesklang['check4updates']='Check for updates';
$hesklang['open']='New';
$hesklang['wait_reply']='Waiting reply';
$hesklang['wait_staff_reply']='Waiting reply from staff';
$hesklang['wait_cust_reply']='Waiting reply from customer';
$hesklang['replied']='Replied';
$hesklang['closed']='Resolved'; // Ticket has been RESOLVED
$hesklang['last_replier']='Last replier';
$hesklang['staff']='Staff';
$hesklang['customer']='Customer';
$hesklang['close_selected']='Mark selected tickets Resolved';
$hesklang['execute']='Execute';
$hesklang['saved_replies']='Canned responses';
$hesklang['manage_saved']='Canned responses';
$hesklang['manage_intro']='Here you can add and manage canned responses. These are commonly used replies which are more or less the same for every customer. You should use canned responses to avoid typing the same reply to different customers numerous times.';
$hesklang['no_saved']='No canned responses';
$hesklang['delete_saved']='Are you sure you want to delete this canned response?';
$hesklang['new_saved']='Add or Edit a canned response';
$hesklang['canned_add']='Create a new canned response';
$hesklang['canned_edit']='Edit selected canned response';
$hesklang['saved_title']='Title';
$hesklang['save_reply']='Save response';
$hesklang['saved']='Response saved';
$hesklang['your_saved']='Your canned response has been saved for future use';
$hesklang['ent_saved_title']='Please enter reply title';
$hesklang['ent_saved_msg']='Please enter reply message';
$hesklang['saved_removed']='Canned response removed';
$hesklang['saved_rem_full']='Selected canned response has been removed from the database';
$hesklang['clip_alt']='This post has attachments';
$hesklang['attachments']='Attachments';
$hesklang['fill_all']='Missing required field';
$hesklang['file_too_large']='Your file %s is too large';
$hesklang['created_on']='Created on';
$hesklang['tickets_closed']='Tickets closed';
$hesklang['num_tickets_closed']='<b>%d</b> tickets have been closed';
$hesklang['select_saved']='Select a canned response';
$hesklang['select_empty']='Select / Empty';
$hesklang['insert_special']='Insert special tag (will be replaced with customer info)';
$hesklang['move_to_catgory']='Move ticket to';
$hesklang['move']='Move';
$hesklang['moved']='Ticket moved';
$hesklang['moved_to']='This ticket has been moved to the new category';
$hesklang['url']='URL';
$hesklang['all_not_closed']='All but closed';
$hesklang['chg_all']='Change all';
$hesklang['settings']='Settings';
$hesklang['settings_intro']='Use this tool to configure your help desk. For more information about all settings and options click the help sign or refer to the readme.html file.';
$hesklang['all_req']='All fields (except disabled ones) are required!';
$hesklang['wbst_title']='Website title';
$hesklang['wbst_url']='Website URL';
$hesklang['email_wm']='Webmaster email';
$hesklang['max_listings']='Listings per page';
$hesklang['print_size']='Print font size';
$hesklang['debug_mode']='Debug mode';
$hesklang['on']='ON';
$hesklang['off']='OFF';
$hesklang['use_secimg']='Use anti-SPAM image';
$hesklang['secimg_no']='Not available';
$hesklang['attach_use']='Use attachments';
$hesklang['attach_num']='Number per post';
$hesklang['attach_type']='Allowed file types';
$hesklang['place_after']='After Message';
$hesklang['place_before']='Before Message';
$hesklang['custom_f']='Custom field';
$hesklang['custom_u']='Use this field';
$hesklang['custom_n']='Field name';
$hesklang['custom_l']='Maximum length (chars)';
$hesklang['db_host']='Database host';
$hesklang['db_name']='Database name';
$hesklang['db_user']='Database username';
$hesklang['db_pass']='Database password';
$hesklang['err_sname']='Please enter your website title';
$hesklang['err_surl']='Please enter your website URL. Make sure it is a valid URL (start with http:// or https://)';
$hesklang['err_wmmail']='Please enter a valid webmaster email';
$hesklang['err_nomail']='Please enter a valid noreply email';
$hesklang['err_htitle']='Please enter the title of your support desk';
$hesklang['err_hurl']='Please enter your Hesk folder url. Make sure it is a valid URL (start with http:// or https://)';
$hesklang['err_lang']='Please select Hesk language';
$hesklang['err_nolang']='The language file specified doesn\'t exist in the language folder! Make sure the file is uploaded before changing the language setting.';
$hesklang['err_max']='Please enter maximum listings displayed per page';
$hesklang['err_psize']='Please enter the print font size';
$hesklang['err_dbhost']='Please enter your MySQL database host';
$hesklang['err_dbname']='Please enter your MySQL database name';
$hesklang['err_dbuser']='Please enter your MySQL database username';
$hesklang['err_dbpass']='Please enter your MySQL database password';
$hesklang['err_dbsele']='Could not select MySQL database, please double-check database NAME';
$hesklang['err_custname']='Please enter name(s) for selected optional field(s)';
$hesklang['err_openset']='Can\'t open file <b>hesk_settings.inc.php</b> for writing. Please CHMOD this file to 666 (rw-rw-rw-)';
$hesklang['set_saved']='Settings saved';
$hesklang['set_were_saved']='Your settings have been successfully saved';
$hesklang['sec_img']='Security image';
$hesklang['sec_miss']='Please enter the security number';
$hesklang['sec_wrng']='Wrong security number';
$hesklang['submit_problems']='Please go back and correct the following problems';
$hesklang['cat_order']='Category order';
$hesklang['reply_order']='Canned response order';
$hesklang['move_up']='Move up';
$hesklang['move_dn']='Move down';
$hesklang['cat_move_id']='Missing category ID';
$hesklang['reply_move_id']='Missing canned response ID';
$hesklang['forgot_tid']='Forgot tracking ID?';
$hesklang['tid_send']='Send me my tracking ID';
$hesklang['tid_not_found']='No tickets with your email address were found';
$hesklang['tid_sent']='Tracking ID sent';
$hesklang['tid_sent2']='An email with details about your tickets has been sent to your address';
$hesklang['check_spambox']='Be sure to also check for the email inside your SPAM/Junk mailbox!';
$hesklang['reply_not_found']='Canned response not found';
$hesklang['exists']='Exists';
$hesklang['no_exists']='Doesn\'t exist';
$hesklang['writable']='Writable';
$hesklang['not_writable']='Not writable';
$hesklang['disabled']='disabled';
$hesklang['e_settings']='You will not be able to save your settings unless this file is writable by the script. Please refer to the readme file for further instructions!';
$hesklang['e_attdir']='You will not be able to use file attachments unless the attachments folder exists and is writable by the script.';
$hesklang['e_save_settings']='Unable to save your settings because <b>hesk_settings.inc.php</b> file is not writable by the script.';
$hesklang['e_attach']='Disabled because your <b>attachments</b> directory is not writable by the script.';
$hesklang['go']='Go';


// ADDED OR CHANGED IN VERSION 2.0
$hesklang['v']='HESK version';
$hesklang['check_status']='Checking status';
$hesklang['sub_support']='Submit a ticket';
$hesklang['open_ticket']='Submit a new issue to a department';
$hesklang['view_existing']='View existing ticket';
$hesklang['vet']='View tickets you submitted in the past';
$hesklang['enter_user']='Please enter your username';
$hesklang['remember_user']='Remember my username';
$hesklang['wrong_user']='Wrong username';
$hesklang['no_permission']='You don\'t have permission to perform this task, please login with an account that has.';
$hesklang['tickets_on_pages']='Number of tickets: %d | Number of pages: %d'; // First %d is replaced with number of tickets, second %d with number of pages
$hesklang['jump_page']=' | Jump to page:';
$hesklang['no_tickets_open']='No unresolved tickets found';
$hesklang['no_tickets_crit']='No tickets found matching your criteria';
$hesklang['confirm_execute']='Are you sure you want to continue?';
$hesklang['legend']='Legend';
$hesklang['main_page']='Home';
$hesklang['menu_users']='Users';
$hesklang['menu_cat']='Categories';
$hesklang['menu_profile']='Profile';
$hesklang['menu_kb']='Knowledgebase'; // Admin MENU item
$hesklang['kb_text']='Knowledgebase'; // Item visible to customers
$hesklang['viewkb']='View entire Knowledgebase';
$hesklang['kb']='Manage Knowledgebase';
$hesklang['kb_intro']='Knowledgebase is a collection of answers to frequently asked questions (FAQ) and articles which provide self-help resources to your customers.
A comprehensive and well-written knowledgebase can drastically reduce the number of support tickets you receive and save a lot of your time. You can arrange articles into categories
and sub categories.'; // Description in ADMIN panel
$hesklang['kb_is']='Knowledgebase is a categorized collection of answers to frequently asked questions (FAQ) and articles. You can read articles in this category or select a subcategory that you are interested in.'; // Description for CUSTOMERS
$hesklang['new_kb_art']='New knowledgebase article';
$hesklang['kb_cat']='Category';
$hesklang['kb_subject']='Subject';
$hesklang['kb_content']='Contents';
$hesklang['kb_type']='Type';
$hesklang['kb_published']='Published';
$hesklang['kb_published2']='The article is viewable to everyone in the knowledgebase.';
$hesklang['kb_private']='Private';
$hesklang['kb_private2']='Private articles can only be read by staff.';
$hesklang['kb_draft']='Draft';
$hesklang['kb_draft2']='The article is saved but not yet published. It can only be read by staff<br /> who has permission to manage knowledgebase articles.';
$hesklang['kb_links']='<i><span class="notice"><b>Warning!</b></span><br />Enter valid code without &lt;head&gt; and &lt;body&gt; tags, just content!</i>';
$hesklang['kb_ehtml']='This is HTML code (I will enter valid (X)HTML code)';
$hesklang['kb_dhtml']='This is plain text (links will be clickable)';
$hesklang['kb_save']='Save article';
$hesklang['kb_e_subj']='Enter article subject!';
$hesklang['kb_e_cont']='Write article contents!';
$hesklang['kb_art_added']='Article added';
$hesklang['your_kb_added']='A new knowledgebase article has been successfully added';
$hesklang['kb_art_deleted']='Article deleted';
$hesklang['your_kb_deleted']='Selected knowledgebase article has been successfully deleted';
$hesklang['kb_art_mod']='Article modified';
$hesklang['your_kb_mod']='Your changes to the selected article have been saved successfully';
$hesklang['kb_cat_new']='New knowledgebase category';
$hesklang['kb_cat_parent']='Parent category';
$hesklang['kb_cat_sub']='Subcategories';
$hesklang['kb_cat_title']='Category title';
$hesklang['kb_cat_published']='The category is viewable to everyone in the knowledgebase.';
$hesklang['kb_cat_private']='The category can only be read by staff.';
$hesklang['kb_cat_add']='Add category';
$hesklang['kb_cat_e_title']='Enter category title!';
$hesklang['kb_cat_added']='Category added';
$hesklang['kb_cat_added2']='A new category has been successfully added to the knowledgebase';
$hesklang['kb_cat_man']='Manage knowledgebase category';
$hesklang['kb_cat_edit']='Edit category details';
$hesklang['kb_cat_inv']='Invalid category';
$hesklang['kb_cat_art']='Articles in this category';
$hesklang['kb_p_art']='+ Article';
$hesklang['kb_p_art2']='add a new article to the selected category.';
$hesklang['kb_add_art']='Add Article';
$hesklang['kb_p_cat']='+ Category';
$hesklang['kb_p_cat2']='create a new sub-category inside the selected category.';
$hesklang['kb_add_cat']='Add Category';
$hesklang['kb_p_man']='Manage';
$hesklang['kb_p_man2']='manage selected category (edit, delete, manage articles).';
$hesklang['kb_main']='The main knowledgebase category cannot be deleted or moved.';
$hesklang['kb_no_art']='There are no articles in this category.';
$hesklang['author']='Author';
$hesklang['views']='Views';
$hesklang['delete']='Delete';
$hesklang['rating']='Rating';
$hesklang['votes']='Votes';
$hesklang['kb_rated']='Article rated %s/5.0';
$hesklang['kb_not_rated']='Article not rated yet';
$hesklang['del_art']='Are you sure you want to delete selected article?';
$hesklang['kb_art_id']='Missing or invalid article ID!';
$hesklang['kb_art_edit']='Edit article';
$hesklang['revhist']='Revision history';
$hesklang['kb_order']='Order';
$hesklang['kb_delcat']='Are you sure you want to delete this category?';
$hesklang['kb_cat_mod']='Category modified';
$hesklang['your_cat_mod']='Your changes to the selected category have been saved successfully';
$hesklang['kb_cat_del']='Knowledgebase category deleted';
$hesklang['kb_cat_dlt']='The selected knowledgebase category has been deleted.';
$hesklang['allowed_cat']='Categories';
$hesklang['allow_feat']='Features';
$hesklang['can_view_tickets']='View tickets';
$hesklang['can_reply_tickets']='Reply to tickets';
$hesklang['can_assign_tickets']='Assign tickets';
$hesklang['can_del_tickets']='Delete tickets';
$hesklang['can_edit_tickets']='Edit ticket replies';
$hesklang['can_change_cat']='Change ticket category';
$hesklang['can_man_kb']='Manage knowledgebase';
$hesklang['can_man_users']='Manage users';
$hesklang['can_man_cat']='Manage categories';
$hesklang['can_man_canned']='Manage canned responses';
$hesklang['can_man_settings']='Manage help desk settings';
$hesklang['can_del_notes']='Delete any ticket notes';
$hesklang['dan']='users can delete their own ticket notes, select this only if you wish to allow this user to also be able to delete notes from other users';
$hesklang['in_all_cat']='in allowed categories only';
$hesklang['admin_can']='(access to all features and categories)';
$hesklang['staff_can']='(you can limit features and categories)';
$hesklang['asign_one_feat']='Please assign at least one feature to this user!';
$hesklang['na_view_tickets']='You are not authorized to view tickets';
$hesklang['support_notice']='Sorry, this section can only be hidden when you purchase a HESK license!';
$hesklang['rart']='Was this article helpful?';
$hesklang['r']='Was this reply helpful?';
$hesklang['tyr']='Thank you for rating';
$hesklang['cw']='Close Window';
$hesklang['cw2']='Close window and submit ticket';
$hesklang['rh']='Rated as <i>helpful</i>';
$hesklang['rnh']='Rated as <i>not helpful</i>';
$hesklang['ar']='Already rated';
$hesklang['rated']='User rated %s/5.0 (%s votes)';
$hesklang['not_rated']='User not rated yet';
$hesklang['rdis']='Rating has been disabled';
$hesklang['kbdis']='Knowledgebase is disabled';
$hesklang['kbpart']='Sorry, you don\'t have permission to access this article';
$hesklang['popart']='Top Knowledgebase articles:';
$hesklang['latart']='Latest Knowledgebase articles:';
$hesklang['m']='More topics';
$hesklang['ac']='Articles in this category:';
$hesklang['noa']='No articles yet';
$hesklang['noac']='No articles yet in this category';
$hesklang['dta']='Date added';
$hesklang['ad']='Article details';
$hesklang['aid']='Article ID';
$hesklang['as']='Solution';
$hesklang['search']='Search';
$hesklang['sr']='Search results';
$hesklang['nosr']='No matching articles found. Try browsing the knowledgebase or submit a new support ticket.';
$hesklang['rv']='Reset views';
$hesklang['rr']='Reset votes (ratings)';
$hesklang['opt']='Options';
$hesklang['delcat']='Delete category';
$hesklang['move1']='Move articles to parent category';
$hesklang['move2']='Delete articles in this category';
$hesklang['sc']='Suggested knowledgebase articles';
$hesklang['not']='Tickets'; // Number of all tickets in category
$hesklang['graph']='Graph';
$hesklang['lu']='List usernames';
$hesklang['aclose']='Autoclose tickets';
$hesklang['aclose2']='days after last staff reply';
$hesklang['s_ucrt']='Reopen tickets';
$hesklang['urate']='Reply ratings';
$hesklang['hesk_url']='Help desk URL';
$hesklang['hesk_title']='Help desk title';
$hesklang['server_time']='Server time offset';
$hesklang['t_h']='hours';
$hesklang['cid']='Case Tracking ID';
$hesklang['t_m']='minutes';
$hesklang['day']='Daylight saving';
$hesklang['tfor']='Time format';
$hesklang['prefix']='Table prefix';
$hesklang['s_kbs']='Enable KB search';
$hesklang['s_kbr']='Enable KB rating';
$hesklang['s_maxsr']='Max search results';
$hesklang['s_suggest']='Suggest KB articles';
$hesklang['s_spop']='Show popular articles';
$hesklang['s_slat']='Show latest articles';
$hesklang['s_onin']='on <a href="../" target="_blank">help desk index</a> page';
$hesklang['s_onkb']='on <a href="../knowledgebase.php" target="_blank">Knowledgebase index</a> page';
$hesklang['s_scol']='Categories in row';
$hesklang['s_ptxt']='Article preview length';
$hesklang['s_psubart']='Subcategory articles';
$hesklang['enable']='Enable';
$hesklang['s_type']='Type';
$hesklang['custom_r']='Required';
$hesklang['custom_place']='Location';
$hesklang['custom_use']='Custom fields';
$hesklang['stf']='Text field';
$hesklang['stb']='Large text box';
$hesklang['srb']='Radio button';
$hesklang['ssb']='Select box';
$hesklang['db']='Database';
$hesklang['hd']='Help desk settings';
$hesklang['gs']='General settings';
$hesklang['cwin']='Close window';
$hesklang['defw']='Default value';
$hesklang['ok']='OK';
$hesklang['ns']='These are available options for this custom field. To save changes click <b>OK</b> and <b>Save changes</b> button on the admin settings page!';
$hesklang['rows']='Rows (height)';
$hesklang['cols']='Columns (width)';
$hesklang['opt2']='Options for this radio button, enter one option per line (each line will create a new radio button value to choose from). You need to enter at least two options!';
$hesklang['opt3']='Options for this select box, enter one option per line (each line will be a choice your customers can choose from). You need to enter at least two options!';
$hesklang['atl2']='Enter at least two options (one per line)!';
$hesklang['notes']='Notes';
$hesklang['addnote']='+ Add note';
$hesklang['noteby']='Note by';
$hesklang['delnote']='Delete note';
$hesklang['noteerr']='Note already deleted or wrong parameters';
$hesklang['s']='Submit';
$hesklang['nhid']='Notes are hidden from customers!';
$hesklang['delt']='Delete this post';
$hesklang['edtt']='Edit post';
$hesklang['edt1']='Post modified';
$hesklang['edt2']='Changes to the selected post have been saved';
$hesklang['dele']='Delete this ticket';
$hesklang['repd']='Post deleted';
$hesklang['repl']='Selected post has been deleted';
$hesklang['tickets_found']='Search results';
$hesklang['al']='Admin link';
$hesklang['ap']='Go to Administration Panel';
$hesklang['dap']='Display a link to admin panel from <a href="../" target="_blank">help desk index</a>';
$hesklang['q_miss']='Please answer the anti-SPAM question';
$hesklang['use_q']='Use anti-SPAM question';
$hesklang['q_q']='-&gt; Question (HTML code is <font class="success">allowed</font>)';
$hesklang['q_a']='-&gt; Answer';
$hesklang['err_qask'] = 'Enter an anti-SPAM question';
$hesklang['err_qans'] = 'Enter answer to the anti-SPAM question';
$hesklang['genq'] = 'Generate a random question';


// Added or modified in version 2.1
$hesklang['amo']='Add more';
$hesklang['delatt']='Delete selected attachment?';
$hesklang['kb_att_rem']='Selected attachment has been removed';
$hesklang['inv_att_id']='Invalid attachment ID!';
$hesklang['scb']='Checkbox';
$hesklang['opt4']='Options for this checkbox, enter one option per line. Each line will be a choice your customers can choose from, multiple choices are possible. You need to enter at least two options!';
$hesklang['autologin']='Log me on automatically each visit';
$hesklang['just_user']='Remember just my username';
$hesklang['nothx']='No, thanks';
$hesklang['pinfo']='Profile information';
$hesklang['sig']='Signature';
$hesklang['pref']='Preferences';
$hesklang['aftrep']='After replying to a ticket';
$hesklang['showtic']='Show the ticket I just replied to';
$hesklang['gomain']='Return to main administration page';
$hesklang['shownext']='Open next ticket that needs my reply';
$hesklang['rssn']='Showing next ticket that needs your attention';
$hesklang['mrep']='Replace message';
$hesklang['madd']='Add to the bottom';
$hesklang['priv']='Private categories and articles viewable to staff only are marked with *';
$hesklang['inve']='Invalid email file';
$hesklang['emfm']='Missing email file';
$hesklang['hesk_lang']='Default Language';
$hesklang['s_mlang']='Multiple languages';
$hesklang['s_mlange']='Enable only if you provide support in all installed languages!';
$hesklang['s_inl']='Test language folder';
$hesklang['ta']='Test again';
$hesklang['alo']='Allow automatic login';
$hesklang['chol']='Preferred Language';
$hesklang['mmdl']='Make this my preferred Language';
$hesklang['warn']='WARNING';
$hesklang['dmod']='Debug mode is enabled. Make sure you disable debug mode in settings once HESK is installed and working properly.';
$hesklang['kb_spar']='Category can\'t be it\'s own parent category!';
$hesklang['mysql_root']='Your MySQL password is empty, are you sure you want to login with root user? This is a significant security risk!';
$hesklang['chg']='Change';
$hesklang['chpri']='Priority changed';
$hesklang['chpri2']='Ticket\'s priority has been changed to %s';
$hesklang['selcan']='Select the canned response you would like to edit';
$hesklang['q_wrng']='Wrong anti-SPAM answer';
$hesklang['cndupl']='You already have a category with that name. Choose a unique name for each category.';
$hesklang['wsel']='Select the field you want to search by';


// Added or modified in version 2.2
$hesklang['eto']='Invalid request';
$hesklang['id']='ID';
$hesklang['geco']='Generate Direct Link';
$hesklang['genl']='Direct Category Link';
$hesklang['genl2']='Use this link to preselect category in the &quot;Submit a ticket&quot; form.';
$hesklang['exa']='Examples';
$hesklang['small']='Small Box';
$hesklang['large']='Large Box';
$hesklang['cpri']='Customer priority';
$hesklang['owner']='Owner';
$hesklang['unas']='Unassigned';
$hesklang['assi']='Assign';
$hesklang['asst']='Assign to';
$hesklang['asst2']='Assign this ticket to';
$hesklang['asss']='Assign to self';
$hesklang['asss2']='Assign this ticket to myself';
$hesklang['can_assign_self']='Can assign tickets to self';
$hesklang['can_assign_others']='Can assign tickets to others';
$hesklang['can_view_ass_others']='Can view tickets assigned to others';
$hesklang['unoa']='Selected user doesn\'t have access to this category';
$hesklang['tasi']='Owner Assigned';
$hesklang['tasy']='This ticket has been assigned to you';
$hesklang['taso']='This ticket has been assigned to the selected user';
$hesklang['tasy2']='Assigned to me';
$hesklang['taso2']='Assigned to other staff';
$hesklang['nose']='Select the new Owner';
$hesklang['onasc']='This owner doesn\'t have access to the selected category.';
$hesklang['tunasi']='Ticket Unassigned';
$hesklang['tunasi2']='Ticket is without an owner and ready to be assigned again';
$hesklang['note']='Note';
$hesklang['success']='Success';
$hesklang['nyt']='This ticket is assigned to';
$hesklang['noch']='No changes have been made';
$hesklang['orch']='Display order has been modified';
$hesklang['rfm']='Required information missing:';
$hesklang['repl0']='Insufficient permissions to perform this task';
$hesklang['repl1']='This post doesn\'t exist';
$hesklang['reports']='Reports';
$hesklang['reports_intro']='The reports section lets you run several reports and see ticket statistics in a chosen date range.';
$hesklang['refi']='Reset form data';
$hesklang['dich']='Discard Changes';
$hesklang['dire']='Display Report';
$hesklang['m1']='January';
$hesklang['m2']='February';
$hesklang['m3']='March';
$hesklang['m4']='April';
$hesklang['m5']='May';
$hesklang['m6']='June';
$hesklang['m7']='July';
$hesklang['m8']='August';
$hesklang['m9']='September';
$hesklang['m10']='October';
$hesklang['m11']='November';
$hesklang['m12']='December';
$hesklang['d1']='Monday';
$hesklang['d2']='Tuesday';
$hesklang['d3']='Wednesday';
$hesklang['d4']='Thursday';
$hesklang['d5']='Friday';
$hesklang['d6']='Saturday';
$hesklang['d0']='Sunday';
$hesklang['mo']='Mo';
$hesklang['tu']='Tu';
$hesklang['we']='We';
$hesklang['th']='Th';
$hesklang['fr']='Fr';
$hesklang['sa']='Sa';
$hesklang['su']='Su';
$hesklang['from']='From';
$hesklang['cinv']='Invalid date';
$hesklang['cinv2']='Accepted format is mm/dd/yyyy';
$hesklang['cinm']='Invalid month value';
$hesklang['cinm2']='Allowed range is';
$hesklang['cind']='Invalid day of month value';
$hesklang['cind2']='Allowed range for selected month is';
$hesklang['month']='Month';
$hesklang['ocal']='Open Calendar';
$hesklang['ca01']='Previous Year';
$hesklang['ca02']='Previous Month';
$hesklang['ca03']='Next Month';
$hesklang['ca04']='Next Year';
$hesklang['ca05']='Close Calendar';
$hesklang['cdr']='Choose date range:';
$hesklang['crt']='Choose report type:';
$hesklang['r1']='Today';
$hesklang['r2']='Yesterday';
$hesklang['r3']='This month';
$hesklang['r4']='Last month';
$hesklang['r5']='Last 30 days';
$hesklang['r6']='This week (Mon-Sun)';
$hesklang['r7']='Last week (Mon-Sun)';
$hesklang['r8']='This business week (Mon-Fri)';
$hesklang['r9']='Last business week (Mon-Fri)';
$hesklang['r10']='This year';
$hesklang['r11']='Last year';
$hesklang['r12']='All time';
$hesklang['datetofrom']='&quot;Date From&quot; cannot be higher than &quot;Date to&quot;. The dates have been switched.';
$hesklang['t1']='Tickets per day';
$hesklang['t2']='Tickets per month';
$hesklang['t3']='Tickets per user';
$hesklang['t4']='Tickets per category';
$hesklang['ticass']='Assigned tickets';
$hesklang['ticall']='Replied to tickets';
$hesklang['totals']='Totals';
$hesklang['all']='All';
$hesklang['atik']='New tickets';
$hesklang['kbca']='You already have a knowledgebase category with this name.';
$hesklang['menu_msg']='Mail';
$hesklang['menu_can']='Canned';
$hesklang['m_from']='From:'; // Mail "from" address
$hesklang['m_to']='To:'; // Mail "to" address
$hesklang['m_sub']='Subject:'; // Mail subject
$hesklang['m_re']='Re:'; // Mail reply subject prefix, like "Re: Original subject"
$hesklang['m_fwd']='Fwd:'; // Mail forward subject prefix, like "Fwd: Original subject"
$hesklang['m_h']='Private messages';
$hesklang['m_intro']='Use private messages to send quick messages to other staff members within the HESK.';
$hesklang['e_udel']='(User deleted)';
$hesklang['new_mail']='New private message';
$hesklang['m_send']='Send message';
$hesklang['m_rec']='Select message recipient';
$hesklang['m_inr']='Invalid message recipient';
$hesklang['m_esu']='Enter private message subject';
$hesklang['m_pms']='Your private message has been sent';
$hesklang['inbox']='INBOX';
$hesklang['outbox']='OUTBOX';
$hesklang['m_new']='NEW MESSAGE';
$hesklang['pg']='Show page';
$hesklang['npm']='No private messages in this folder.';
$hesklang['m_ena']='You don\'t have permission to read this message.';
$hesklang['mau']='Mark as unread';
$hesklang['mo1']='Mark selected messages as read';
$hesklang['mo2']='Mark selected messages as unread';
$hesklang['mo3']='Delete selected messages';
$hesklang['delm']='Delete this message';
$hesklang['e_tid']='Error generating a unique ticket ID, please try submitting the form again later.';
$hesklang['smmr']='Selected messages have been marked as read';
$hesklang['smmu']='Selected messages have been marked as unread';
$hesklang['smdl']='Selected messages have been deleted';
$hesklang['show']='Show';
$hesklang['s_my']='Assigned to me';
$hesklang['s_ot']='Assigned to others';
$hesklang['s_un']='Unassigned tickets';
$hesklang['s_for']='Search for';
$hesklang['s_in']='Search in';
$hesklang['s_incl']='Search within';
$hesklang['find_ticket_by']='Find a ticket';
$hesklang['e_nose']='No assignment status selected, showing all tickets.';
$hesklang['fsq']='Enter your search query';
$hesklang['topen']='Open'; // Not-resolved tickets
$hesklang['nms']='No messages selected, nothing to change';
$hesklang['tlo']='Lock ticket';
$hesklang['tul']='Unlock ticket';
$hesklang['loc']='Locked';
$hesklang['isloc']='Customers cannot reply to or re-open locked tickets. When locked ticket is marked as resolved.';
$hesklang['tlock']='Ticket has been locked';
$hesklang['tunlock']='Ticket has been unlocked';
$hesklang['tislock']='This ticket has been locked, the customer will not be able to post a reply.';
$hesklang['tislock2']='This ticket has been locked, you cannot post a reply.';
$hesklang['nsfo']='No relevant articles found.';
$hesklang['elocked']='This ticket has been locked or deleted.';
$hesklang['nti']='+ New ticket';
$hesklang['nti2']='Insert a new ticket';
$hesklang['nti3']='Use this form to create a new ticket in a customer\'s name. Enter <i>customer</i> information in the form (customer name, customer email, ...) and NOT your name! Ticket will be created as if the customer submitted it.';
$hesklang['addop']='Options';
$hesklang['seno']='Send email notification to the customer';
$hesklang['otas']='Show the ticket after submission';
$hesklang['notn']='Notifications';
$hesklang['nomw']='The help desk will send an email notification when:';
$hesklang['nwts']='A new ticket is submitted with owner:';
$hesklang['ncrt']='Client responds to a ticket with owner:';
$hesklang['ntam']='A ticket is assigned to me';
$hesklang['npms']='A private message is sent to me';
$hesklang['support_remove']='A lot of time and effort went into developing HESK. Support HESK by purchasing a license that will remove the credits links <i>Powered by Help Desk Software HESK</i> from your helpdesk';
$hesklang['ycvtao']='You are not allowed to view tickets assigned to others';
$hesklang['password_not_valid']='Password must be at least 5 chars long';
$hesklang['lkbs']='Loading knowledgebase suggestions...';
$hesklang['auto']='(automatically)';

// Added or modified in version 2.3
$hesklang['unknown']='Unknown';
$hesklang['pcer']='Please correct the following errors:';
$hesklang['seqid']='Ticket number';
$hesklang['close_action']='Mark as Resolved'; // Close ACTION
$hesklang['archived']='Tagged';
$hesklang['archived2']='Tagged Ticket';
$hesklang['add_archive']='Tag this ticket';
$hesklang['add_archive_quick']='Tag selected tickets';
$hesklang['remove_archive']='Untag this ticket';
$hesklang['remove_archive_quick']='Untag selected tickets';
$hesklang['added_archive']='Ticket Tagged';
$hesklang['removed_archive']='Ticket Untagged';
$hesklang['added2archive']='Ticket has been tagged';
$hesklang['removedfromarchive']='Ticket has been untagged';
$hesklang['num_tickets_tag']='<b>%d</b> tickets have been tagged';
$hesklang['num_tickets_untag']='<b>%d</b> tickets have been untagged';
$hesklang['can_add_archive']='Can tag tickets';
$hesklang['disp_only_archived']='Only tagged tickets';
$hesklang['search_only_archived']='Only tagged tickets';
$hesklang['critical']=' * Critical * ';
// START abbreviatons used in "last updated" column
$hesklang['abbr']['year']='y';
$hesklang['abbr']['month']='mo';
$hesklang['abbr']['week']='w';
$hesklang['abbr']['day']='d';
$hesklang['abbr']['hour']='h';
$hesklang['abbr']['minute']='m';
$hesklang['abbr']['second']='s';
// END abberviations
$hesklang['cnsm']='Cound not send the message to:';
$hesklang['yhbb']='You have been locked out the system for %s minutes because of too many login failures.';
$hesklang['pwdst']='Password Strength';
$hesklang['tid_mail']='No worries! Enter your <b>Email address</b> and we will send you your tracking ID right away:';
$hesklang['rem_email']='Remember my email address';
$hesklang['eytid']='Enter your ticket tracking ID.';
$hesklang['enmdb']='The email address you entered doesn\'t match the one in the database for this ticket ID.';
$hesklang['confemail']='Confirm Email';
$hesklang['confemail2']='Please confirm your Email address';
$hesklang['confemaile']='The two email addresses are not identical';
$hesklang['taso3']='Assigned to:';
$hesklang['sec_enter']='Type the number you see in the picture below.';
$hesklang['reload']='Reload image';
$hesklang['verify_q']='SPAM Prevention:'; // For anti-spam question
$hesklang['verify_i']='SPAM Prevention:'; // For anti-spam image (captcha)
$hesklang['admin_login']='Staff login';
$hesklang['vrfy']='Test passed';
$hesklang['last_update']='Updated';
$hesklang['cot']='Don\'t force Critical tickets on top';
$hesklang['def']='Make this my default view';
$hesklang['gbou']='These tickets are <b>Unassigned</b>:';
$hesklang['gbom']='Tickets assigned to <b>me</b>:';
$hesklang['gboo']='Tickets assigned to <b>%s</b>:';
$hesklang['select']=' - - Click to Select - - ';
$hesklang['chngstatus']='Change status to';
$hesklang['perat']='%s of all tickets'; // will change to "23% of all tickets"
$hesklang['viewart']='View this article';
$hesklang['chdp']='Please change the default password on your <a href="profile.php">Profile</a> page!';
$hesklang['chdp2']='Change your password, you are using the default one!';
$hesklang['security']='Security';
$hesklang['kb_i_art']='New Article';
$hesklang['kb_i_art2']='Insert an Article';
$hesklang['kb_i_cat']='New Category';
$hesklang['kb_i_cat2']='Insert a Category';
$hesklang['gopr']='View Knowledgebase';
$hesklang['kbstruct']='Knowledgebase structure';
$hesklang['cancel']='Cancel';
$hesklang['sh']='Hide Message';
$hesklang['goodkb']='How to write good knowledgebase articles?';
$hesklang['catset']='Category Settings';
$hesklang['inpr']='Select the new Priority';
$hesklang['incat']='Select the new Category';
$hesklang['instat']='Select the new Status';
$hesklang['tsst']='Ticket status has been set to %s';
$hesklang['aass']='Auto-assign';
$hesklang['aaon']='Auto-assign of tickets enabled (click to disable)';
$hesklang['aaoff']='Auto-assign of tickets disabled (click to enable)';
$hesklang['uaaon']='Auto-assign has been enabled for selected user';
$hesklang['uaaoff']='Auto-assign has been disabled for selected user';
$hesklang['taasy']='This ticket has been auto-assigned to you';
$hesklang['can_view_unassigned']='Can view unassigned tickets';
$hesklang['ycovtay']='You can only view tickets assigned to you';
$hesklang['in_progress']='In Progress';
$hesklang['on_hold']='On Hold';
$hesklang['import_kb']='Import this ticket into a Knowledgebase article';
$hesklang['import']='You are importing a <i>private ticket</i> into a <i>public article</i>.<br /><br />Make sure you delete any private or sensitive information from the article subject and message!';
$hesklang['tab_1']='General';
$hesklang['tab_2']='Help Desk';
$hesklang['tab_3']='Knowledgebase';
$hesklang['tab_4']='Custom Fields';
$hesklang['tab_5']='Misc';
$hesklang['disable']='Disable';
$hesklang['dat']='Date &amp; Time';
$hesklang['lgs']='Language';
$hesklang['onc']='ON - Customers';
$hesklang['ons']='ON - All';
$hesklang['viewvtic']='View tickets';
$hesklang['reqetv']='Require email to view a ticket';
$hesklang['banlim']='Login attempts limit';
$hesklang['banmin']='Ban time (minutes)';
$hesklang['subnot']='Submit notice';
$hesklang['subnot2']='Show notice to customers submitting tickets';
$hesklang['eseqid']='Sequential IDs';
$hesklang['sconfe']='Confirm email';
$hesklang['saass']='Auto-assign tickets';
$hesklang['swyse']='WYSIWYG Editor';
$hesklang['hrts']='Rate HESK';
$hesklang['hrts2']='Show Rate this script link in admin panel';
$hesklang['emlpipe']='Email Piping';
$hesklang['emlsend']='Email Sending';
$hesklang['emlsend2']='Send emails using';
$hesklang['phpmail']='PHP mail()';
$hesklang['smtp']='SMTP Server';
$hesklang['smtph']='SMTP Host';
$hesklang['smtpp']='SMTP Port';
$hesklang['smtpu']='SMTP Username';
$hesklang['smtpw']='SMTP Password';
$hesklang['smtpt']='SMTP Timeout';
$hesklang['other']='Other';
$hesklang['features']='Features';
$hesklang['can_view_online']='Can view online staff members';
$hesklang['online']='Online';
$hesklang['offline']='Offline';
$hesklang['onlinep']='Users Online'; // For display
$hesklang['sonline']='Users Online'; // For settings page
$hesklang['sonline2']='Show online users. Limit (minutes):'; // For settings page
$hesklang['gb']='Group by';
$hesklang['dg']='Don\'t group';
$hesklang['err_dpi']='Database %s does not contain all HESK tables with prefix %s, no changes saved.';
$hesklang['err_dpi2']='Tables not found:';
$hesklang['sme']='SMTP error';
$hesklang['scl']='SMTP connection log';
$hesklang['dnl']='Download';
$hesklang['dela']='Delete this attachment';
$hesklang['pda']='Do you want to permanently delete this attachment?';
$hesklang['mopt']='More options';
$hesklang['lopt']='Less options';
$hesklang['meml']='Multiple emails';
$hesklang['meml2']='Allow customers to enter multiple contact emails';


// Added or modified in version 2.4
$hesklang['catd']='(category deleted)';
$hesklang['noopen']='No open tickets found for this email address.';
$hesklang['maxopen']='You have reached maximum open tickets (%d of %d). Please wait until your existing tickets are resolved before opening new tickets.';
$hesklang['ntnote']='Someone adds a note to a ticket assigned to me';
$hesklang['cat_public']='This category is PUBLIC (click to make private)';
$hesklang['cat_private']='This category is PRIVATE (click to make public)';
$hesklang['cat_aa']='Auto-assign tickets in this category.';
$hesklang['cat_type']='Make this category private (only staff can select it).';
$hesklang['caaon']='Auto-assign has been enabled for selected category';
$hesklang['caaoff']='Auto-assign has been disabled for selected category';
$hesklang['cpub']='Category type changed to PUBLIC';
$hesklang['cpriv']='Category type changed to PRIVATE';
$hesklang['cpric']='Customers cannot select private categories, only staff can!';
$hesklang['user_aa']='Auto-assign tickets to this user.';
$hesklang['attach_size']='Maxmimum file size';
$hesklang['B']='B';
$hesklang['kB']='kB';
$hesklang['MB']='MB';
$hesklang['GB']='GB';
$hesklang['bytes']='bytes';
$hesklang['kilobytes']='kilobytes';
$hesklang['megabytes']='megabytes';
$hesklang['gigabytes']='gigabytes';
$hesklang['smtpssl']='SSL Protocol';
$hesklang['smtptls']='TLS Protocol';
$hesklang['oo']='Open only';
$hesklang['ool']='List only open tickets in &quot;Forgot tracking ID&quot; email';
$hesklang['mop']='Max open tickets';
$hesklang['rord']='Reply order';
$hesklang['newbot']='Newest reply at bottom';
$hesklang['newtop']='Newest reply at top';
$hesklang['ford']='Reply form';
$hesklang['formbot']='Show form at bottom';
$hesklang['formtop']='Show form at top';
$hesklang['mysqlv']='MySQL version';
$hesklang['phpv']='PHP version';
$hesklang['csrt']='Current HESK time:';
$hesklang['listp']='List private articles';
$hesklang['listd']='List article drafts';
$hesklang['artp']='Private articles';
$hesklang['artd']='Article drafts';
$hesklang['kb_no_part']='No private articles in the knowledgebase.';
$hesklang['kb_no_dart']='No article drafts in the knowledgebase.';
$hesklang['attpri']='You don\'t have access to this attachment.';
$hesklang['can_merge_tickets']='Merge tickets';
$hesklang['mer_selected']='Merge selected tickets';
$hesklang['merged']='Selected tickets have been merged into one.';
$hesklang['merge_err']='There was a problem merging tickets:';
$hesklang['merr1']='select at least two tickets.';
$hesklang['merr2']='target ticket not found.';
$hesklang['merr3']='ticket in a category you don\'t have access to.';
$hesklang['tme']='Ticket %s has been merged with this ticket (%s).';
$hesklang['tme1']='Ticket %s has been merged with ticket %s';
$hesklang['tme2']='To access ticket %s enter associated email address.';
$hesklang['eyou']='Use Profile page to edit your settings.';
$hesklang['npea']='You don\'t have permission to edit this user.';
$hesklang['duplicate_user']='User with this username already exists, choose a different username.';
$hesklang['kw']='Keywords';
$hesklang['kw1']='(optional - separate by space, comma or new line)';
$hesklang['type_not_allowed']='Files ending with <b>%s</b> are not accepted (%s)'; // Files ending with .exe are not accepted (test.exe)
$hesklang['unread']='Customer didn\'t read this reply yet.';
$hesklang['sticky']='Make this article &quot;Sticky&quot;';
$hesklang['stickyon']='Change article to &quot;Sticky&quot;';
$hesklang['stickyoff']='Change article to &quot;Normal&quot;';
$hesklang['ason']='Article marked as &quot;Sticky&quot;';
$hesklang['asoff']='Article marked as &quot;Normal&quot;';
$hesklang['ts']='Time worked';
$hesklang['start']='Start / Stop';
$hesklang['reset']='Reset';
$hesklang['save']='Save';
$hesklang['hh']='Hours';
$hesklang['mm']='Minutes';
$hesklang['ss']='Seconds';
$hesklang['thist']='Ticket history';
$hesklang['twu']='Time worked on ticket has been updated.';
$hesklang['autoss']='Automatically start timer when I open a ticket';
$hesklang['ful']='File upload limits';
$hesklang['ufl']='You may upload files ending with:';
$hesklang['nat']='Maximum number of attachments:';
$hesklang['mfs']='Maximum size per attachment:';
$hesklang['lps']='Your language preference has been saved';
$hesklang['sav']='Show article views';
$hesklang['sad']='Show article date';
$hesklang['epd']='[HESK] EMAIL PIPING IS DISABLED IN SETTINGS';
$hesklang['pfd']='[HESK] POP3 FETCHING IS DISABLED IN SETTINGS';
$hesklang['pem']='[Piped email]'; // Default subject of piped tickets without subject
$hesklang['pde']='[Customer]'; // Default customer name for piped tickets without name
$hesklang['tab_6']='Email';
$hesklang['pop3']='POP3 Fetching';
$hesklang['pop3h']='POP3 Host';
$hesklang['pop3p']='POP3 Port';
$hesklang['pop3tls']='TLS Protocol';
$hesklang['pop3u']='POP3 Username';
$hesklang['pop3w']='POP3 Password';
$hesklang['pop3e']='POP3 error';
$hesklang['pop3log']='POP3 connection log';
$hesklang['mysqltest']='Test MySQL connection';
$hesklang['smtptest']='Test SMTP connection';
$hesklang['pop3test']='Test POP3 connection';
$hesklang['contest']='Testing connection, this can take a while...';
$hesklang['conok']='Connection successful!';
$hesklang['conokn']='However, if your server requires username and password email will not be sent!';
$hesklang['saving']='Saving settings, please wait...';
$hesklang['sns']='Settings were saved, but some functions were disabled because of failed tests.';
$hesklang['loops']='Email Loops';
$hesklang['looph']='Max Hits';
$hesklang['loopt']='Timeframe';
$hesklang['didum']='Did you mean %s?'; // Did you mean someone@gmail.com?
$hesklang['yfix']='Yes, fix it';
$hesklang['nole']='No, leave it';
$hesklang['sconfe2']='Show a &quot;Confirm email&quot; field on the submit a ticket form';
$hesklang['oln']='Old name:';
$hesklang['nen']='New name:';
$hesklang['use_form_below']='<i>Use this form to submit a support request. Required fields are marked with</i>';
$hesklang['esf']='Could not send email notifications.';
$hesklang['qrr']='(quoted reply removed)';
$hesklang['remqr']='Strip quoted reply';
$hesklang['remqr2']='Delete quoted reply from customer emails';
$hesklang['suge']='Detect email typos';
$hesklang['epro']='Email providers';
$hesklang['email_noreply']='&quot;From:&quot; email';
$hesklang['email_name']='&quot;From:&quot; name';
$hesklang['vscl']='Server configuration limits';
$hesklang['fnuscphp']='File upload failed, try with a smaller or no file attachment.';
$hesklang['redv']='reset default view';
$hesklang['fatte1']='Your attachments setting &quot;Number per post&quot; is larger than what your server allows!';
$hesklang['fatte2']='Your maximum attachment file size is larger than what your server allows!';
$hesklang['fatte3']='Your server does not allow large enough posts, try reducing number of attachments or allowed file size!';
$hesklang['embed']='Embedded files';
$hesklang['embed2']='Save embedded files as attachments';
$hesklang['emrem']='(image removed)';
$hesklang['hdemo']='(HIDDEN IN DEMO)';
$hesklang['ddemo']='Sorry, this function has been disabled in DEMO mode!';
$hesklang['sdemo']='Saving changes has been disabled in DEMO mode';
$hesklang['hud']='HESK is up to date';
$hesklang['hnw']='Update available';
$hesklang['getup']='Update HESK';
$hesklang['updates']='Updates';
$hesklang['updates2']='Automatically check for HESK updates.';


// Added or modified in version 2.5.0
$hesklang['emp']='Your PHP does not have MySQL support enabled (mysqli extension required)';
$hesklang['attdel']='This file has been deleted from the server and is no longer available for download';
$hesklang['cannot_move_tmp']='Cannot move file to the attachments folder';
$hesklang['dsen']='Don\'t send email notification of this reply to the customer';
$hesklang['attrem']='* Some attached files have been removed *';
$hesklang['attnum']='Max number reached: %s'; // %s will show attachment name
$hesklang['attsiz']='File too large: %s'; // %s will show attachment name
$hesklang['atttyp']='Type not allowed: %s'; // %s will show attachment name
$hesklang['adf']='Admin folder';
$hesklang['atf']='Attachments folder';
$hesklang['err_adf']='The selected admin folder (%s) does not exist!'; // %s will show folder name
$hesklang['err_atf']='The selected attachments folder (%s) does not exist!'; // %s will show folder name
$hesklang['err_atr']='The selected attachments folder (%s) is not writable!'; // %s will show folder name
$hesklang['fatt']='Files attached to this message:';
$hesklang['wrepo']='Please write a reply after re-opening the ticket.';
$hesklang['ktool']='&raquo; Knowledgebase tools';
$hesklang['uac']='Verify and update category article count';
$hesklang['acv']='Article count has been verified';
$hesklang['xyz']='number of public, private and draft articles in category.';
$hesklang['reports_tab']='Run reports'; // Tab title
$hesklang['crt']='Report type';
$hesklang['can_run_reports']='Can run reports (own)';
$hesklang['can_run_reports_full']='Can run reports (all)';
$hesklang['can_export']='Can export tickets';
$hesklang['roo']='<i>(only tickets assigned to you are included in the report)</i>';
$hesklang['shu']='Short links';
$hesklang['export']='Export tickets'; // Tab title
$hesklang['export_btn']='Export tickets'; // Button title
$hesklang['export_intro']='This tool allows you to export tickets into an XML spreadsheet that can be opened in Excel.';
$hesklang['stte']='Select tickets to export';
$hesklang['dtrg']='Date range';
$hesklang['sequentially']='Sequentially'; // Order tickets: Sequentially
$hesklang['ede']='Cannot create export directory, please manually create a folder called <b>export</b> inside your attachments folder and make sure it is writable by PHP (on Linux CHMOD it to 777 - rwxrwxrwx).';
$hesklang['eef']='Cannot create export file, no permission to write inside the export directory.';
$hesklang['inite']='Initializing export';
$hesklang['gXML']='Generating XML file';
$hesklang['nrow']='Number of rows exported: %d'; // %d will show number of rows exported
$hesklang['cZIP']='Compressing file into a Zip archive';
$hesklang['eZIP']='Error creating Zip archive';
$hesklang['fZIP']='Finished compressing the file';
$hesklang['pmem']='Peak memory usage: %.2f Mb'; // %.2f will be replaced with number of Mb used
$hesklang['ch2d']='&raquo; CLICK HERE TO DOWNLOAD THE EXPORT FILE &laquo;';
$hesklang['n2ex']='No tickets found matching your criteria, nothing to export!';
$hesklang['sp']='SPAM Prevention'; // For settings page
$hesklang['sit']='-&gt; Image Type';
$hesklang['sis']='Simple image';
$hesklang['pop3keep']='Keep a copy';
$hesklang['err_dbconn']='Could not connect to MySQL database using provided information!';
$hesklang['s_inle']='Testing the language folder for valid languages. Only languages that pass all tests are properly installed.';
$hesklang['ask']='Search help:';
$hesklang['beta']='(TEST VERSION)';
$hesklang['maxpost']='You probably tried to submit more data than this server accepts.<br /><br />Please try submitting the form again with smaller or no attachments.';

// --> Ticket history log
// Unless otherwise specified, first %s will be replaced with date and second with name/username
$hesklang['thist1']='<li class="smaller">%s | moved to category %s by %s</li>'; // %s = date, new category, user making change
$hesklang['thist2']='<li class="smaller">%s | assigned to %s by %s</li>'; // %s = date, assigned user, user making change
$hesklang['thist3']='<li class="smaller">%s | closed by %s</li>';
$hesklang['thist4']='<li class="smaller">%s | opened by %s</li>';
$hesklang['thist5']='<li class="smaller">%s | locked by %s</li>';
$hesklang['thist6']='<li class="smaller">%s | unlocked by %s</li>';
$hesklang['thist7']='<li class="smaller">%s | ticket created by %s</li>';
$hesklang['thist8']='<li class="smaller">%s | priority changed to %s by %s</li>'; // %s = date,new priority, user making change
$hesklang['thist9']='<li class="smaller">%s | status changed to %s by %s</li>'; // %s = date, new status, user making change
$hesklang['thist10']='<li class="smaller">%s | automatically assigned to %s</li>';
$hesklang['thist11']='<li class="smaller">%s | submitted by email piping</li>';
$hesklang['thist12']='<li class="smaller">%s | attachment %s deleted by %s</li>'; // %s = date, deleted attachment, user making change
$hesklang['thist13']='<li class="smaller">%s | merged with ticket %s by %s</li>'; // %s = date, merged ticket ID, user making change
$hesklang['thist14']='<li class="smaller">%s | time worked updated to %s by %s</li>'; // %s = date, new time worked, user making change
$hesklang['thist15']='<li class="smaller">%s | submitted by %s</li>';
$hesklang['thist16']='<li class="smaller">%s | submitted by POP3 fetching</li>';

// --> Knowledgebase articles log
// First %s will be replaced with date and second with user making changes
$hesklang['revision1']='<li class="smaller">%s | submitted by %s</li>';
$hesklang['revision2']='<li class="smaller">%s | modified by %s</li>';

// --> Text used by ReCaptcha
$hesklang['visual_challenge']='Get a visual challenge';
$hesklang['audio_challenge']='Get an audio challenge';
$hesklang['refresh_btn']='Get a new challenge';
$hesklang['instructions_visual']='Type the two words:';
$hesklang['instructions_context']='Type the words in the boxes:';
$hesklang['instructions_audio']='Type what you hear:';
$hesklang['help_btn']='Help';
$hesklang['play_again']='Play sound again';
$hesklang['cant_hear_this']='Download sound as MP3';
$hesklang['incorrect_try_again']='Incorrect. Try again.';
$hesklang['image_alt_text']='reCAPTCHA challenge image';
$hesklang['recaptcha_error']='Incorrect SPAM Prevention answer, please try again.';


// Added or modified in version 2.5.3
$hesklang['close_this_ticket']='Mark this ticket Resolved';


// Added or modified in version 2.6.0
$hesklang['ms01']='Jan';
$hesklang['ms02']='Feb';
$hesklang['ms03']='Mar';
$hesklang['ms04']='Apr';
$hesklang['ms05']='May';
$hesklang['ms06']='Jun';
$hesklang['ms07']='Jul';
$hesklang['ms08']='Aug';
$hesklang['ms09']='Sep';
$hesklang['ms10']='Oct';
$hesklang['ms11']='Nov';
$hesklang['ms12']='Dec';
$hesklang['sdf']='Submitted date format';
$hesklang['lcf']='Updated date format';
$hesklang['lcf0']='Short descriptive';
$hesklang['lcf1']='Date and time';
$hesklang['lcf2']='HESK style';
$hesklang['ticket_tpl']='Ticket templates';
$hesklang['can_man_ticket_tpl']='Manage ticket templates'; // Permission title
$hesklang['ticket_tpl_man']='Manage ticket templates'; // Page/link title
$hesklang['ticket_tpl_intro']='Create and edit ticket templates that you can use to quickly submit new tickets from the admin interface.';
$hesklang['no_ticket_tpl']='No ticket templates';
$hesklang['ticket_tpl_title']='Title';
$hesklang['delete_tpl']='Are you sure you want to delete this template?';
$hesklang['new_ticket_tpl']='Add or Edit a ticket template';
$hesklang['ticket_tpl_add']='Create a new ticket template';
$hesklang['ticket_tpl_edit']='Edit selected ticket template';
$hesklang['save_ticket_tpl']='Save ticket template';
$hesklang['ticket_tpl_saved']='Your ticket template has been saved for future use';
$hesklang['ticket_tpl_removed']='Selected ticket template has been removed from the database';
$hesklang['ticket_tpl_not_found']='Ticket template not found';
$hesklang['sel_ticket_tpl']='Select the ticket template you would like to edit';
$hesklang['ent_ticket_tpl_title']='Please enter template title';
$hesklang['ent_ticket_tpl_msg']='Please enter template message';
$hesklang['ticket_tpl_id']='Missing ticket template ID';
$hesklang['select_ticket_tpl']='Select a ticket template';
$hesklang['list_tickets_cat']='List all tickets in this category';
$hesklang['def_msg']='[No message]';
$hesklang['emlreqmsg']='Require message';
$hesklang['emlreqmsg2']='Ignore piped/fetched emails with no message';
$hesklang['relart']='Related articles'; // Title of related articles box
$hesklang['s_relart']='Related articles'; // On settings page
$hesklang['tab_7']='Ticket list';
$hesklang['fitl']='Fields in ticket list';
$hesklang['submitted']='Submitted';
$hesklang['clickemail']='View';
$hesklang['set_pri_to']='Set priority to:'; // Action below the ticket list
$hesklang['pri_set_to']='Priority has been set to:';
$hesklang['cat_pri']='The category priority will be used when customers are not allowed to select priority and a ticket is submitted from the customer interface.';
$hesklang['cat_pri_info']='Your customers are allowed to select priority, so category priority will be ignored.<br /><br />To use category priority instead, turn OFF the following feature in HESK settings:';
$hesklang['def_pri']='Category priority:';
$hesklang['ch_cat_pri']='Set category priority';
$hesklang['cat_pri_ch']='Category priority has been set to:';
$hesklang['err_dbversion']='Too old MySQL version:'; // %s will be replaced with MySQL version
$hesklang['signature_max']='Signature (max 1000 chars)';
$hesklang['signature_long']='User signature is too long! Please limit the signature to 1000 chars';
$hesklang['ip_whois']='IP whois';
$hesklang['ednote']='Edit note message';
$hesklang['ednote2']='Note message saved';
$hesklang['perm_deny']='Permission denied';
$hesklang['mis_note']='Missing note ID';
$hesklang['no_note']='Note with this ID not found';
$hesklang['sacl']='Save and continue later';
$hesklang['reply_saved']='Your reply message has been saved for later.';
$hesklang['submit_as']='Submit as:';
$hesklang['sasc']='Submit as Customer reply';
$hesklang['creb']='Customer reply entered by:';
$hesklang['show_select']='Show &quot;Click to select&quot; as default option';
// Settings
$hesklang['mms']='Maintenance mode';
$hesklang['mmd']='Enable maintenance mode';
// Customer notice
$hesklang['mm1']='Maintenance in progress';
$hesklang['mm2']='In order to perform scheduled maintenance, our help desk has shut down temporarily.';
$hesklang['mm3']='We apologize for the inconvenience and ask that you please try again later.';
// Staff notice
$hesklang['mma1']='Maintenance mode is active!';
$hesklang['mma2']='Customers are not able to use the help desk.';
$hesklang['tools']='Tools';
$hesklang['banemail']='Banned Emails';
$hesklang['banemail_intro']='Prevent certain email addresses from submitting tickets to your help desk.';
$hesklang['no_banemails']='<i>No emails are being banned.</i>';
$hesklang['eperm']='Permanent email bans:';
$hesklang['bananemail']='Email address to ban';
$hesklang['savebanemail']='Ban this email';
$hesklang['enterbanemail']='Enter the email address you wish to ban.';
$hesklang['validbanemail']='Enter a valid email address (<i>john.doe@domain.com</i>) or email domain (<i>@domain.com</i>)';
$hesklang['email_banned']='The email address <i>%s</i> was banned and HESK will no longer accept tickets from this address.'; // %s will be replaced with email
$hesklang['emailbanexists']='The email address <i>%s</i> is already banned.'; // %s will be replaced with email
$hesklang['email_unbanned']='Email ban deleted';
$hesklang['banby']='Banned by';
$hesklang['delban']='Delete ban';
$hesklang['delban_confirm']='Delete this ban?';
$hesklang['baned_e']='You have been banned from submitting new support tickets.';
$hesklang['baned_ip']='You have been banned from this help desk';
$hesklang['can_ban_emails']='Can ban emails';
$hesklang['can_unban_emails']='Can unban emails (enables Can ban emails)';
$hesklang['eisban']='This email address is banned.';
$hesklang['click_unban']='Click here to unban.';
$hesklang['banip']='Banned IPs';
$hesklang['banip_intro']='Visitors from banned IP addresses will not be able to view or submit tickets and login into the help desk.';
$hesklang['ipperm']='Permanent IP bans:';
$hesklang['iptemp']='Login failure bans:';
$hesklang['savebanip']='Ban this IP';
$hesklang['no_banips']='<i>No IPs are being banned.</i>';
$hesklang['bananip']='IP address to ban';
$hesklang['banex']='Examples:';
$hesklang['iprange']='IP range';
$hesklang['savebanip']='Ban this IP';
$hesklang['ippermban']='Ban this IP permanently';
$hesklang['enterbanip']='Enter the IP address or range you wish to ban.';
$hesklang['validbanip']='Enter a valid IP address or IP range';
$hesklang['ip_banned']='The IP address <i>%s</i> was banned and HESK will no longer accept tickets from this IP address.'; // %s will be replaced with ip
$hesklang['ip_rbanned']='The IP range <i>%s</i> was banned and HESK will no longer accept tickets from this IP range.'; // %s will be replaced with ip
$hesklang['ipbanexists']='The IP address <i>%s</i> is already banned.'; // %s will be replaced with ip
$hesklang['iprbanexists']='The IP range <i>%s</i> is already banned.'; // %s will be replaced with ip
$hesklang['ip_unbanned']='IP ban deleted';
$hesklang['ip_tempun']='Temporary IP ban deleted';
$hesklang['can_ban_ips']='Can ban ips';
$hesklang['can_unban_ips']='Can unban ips (enables Can ban ips)';
$hesklang['ipisban']='This IP address is banned.';
$hesklang['m2e']='Expires in (minutes)';
$hesklang['info']='Info';
$hesklang['sm_title']='Service messages';
$hesklang['sm_intro']='Display a service message in the customer area, for example to notify them about known issues and important news.';
$hesklang['can_service_msg']='Edit service messages';
$hesklang['new_sm']='New service message';
$hesklang['edit_sm']='Edit service message';
$hesklang['ex_sm']='Existing service messages';
$hesklang['sm_author']='Author';
$hesklang['sm_type']='Type';
$hesklang['sm_published']='Published';
$hesklang['sm_draft']='Draft';
$hesklang['sm_style']='Style';
$hesklang['sm_none']='None';
$hesklang['sm_success']='Success';
$hesklang['sm_info']='Info';
$hesklang['sm_notice']='Notice';
$hesklang['sm_error']='Error';
$hesklang['sm_save']='Save service message';
$hesklang['sm_preview']='Preview service message';
$hesklang['sm_mtitle']='Title';
$hesklang['sm_msg']='Message';
$hesklang['sm_e_title']='Enter service message title';
$hesklang['sm_e_msg']='Enter service message';
$hesklang['sm_e_id']='Missing message ID';
$hesklang['sm_added']='A new service message has been added';
$hesklang['sm_deleted']='Service message deleted';
$hesklang['sm_not_found']='This service message does not exist';
$hesklang['no_sm']='No service messages';
$hesklang['del_sm']='Delete this service message?';
$hesklang['sm_mdf']='Service message has been saved';
$hesklang['sska']='Show suggested articles';
$hesklang['taws']='These articles were suggested:';
$hesklang['defaults']='Defaults';
$hesklang['pncn']='Select notify customer option in the new ticket form';
$hesklang['pncr']='Select notify customer option in the ticket reply form';
$hesklang['pssy']='Show what knowledgebase articles were suggested to customers';
$hesklang['ccct']='Customer resolve';
$hesklang['custnot']='Notify customers when';
$hesklang['notnew']='A new support ticket is submitted';
$hesklang['notclo']='A support ticket is marked Resolved';
$hesklang['enn']='Except for Email piping/POP3 fetching if email subject contains:';
$hesklang['spamn']='SPAM notice';
$hesklang['spam_inbox']='<span style="color:red"><b>No confirmation email?</b><br />We sent a confirmation message to your email address. If you do not receive it within a few minutes, please check your Junk, Bulk or Spam folders. Mark the message as <b>Not SPAM</b> to avoid problems receiving our correspondence in the future.</span>';
$hesklang['s_ekb']='Enable Knowledgebase';
$hesklang['ekb_n']='<b>NO</b>, disable Knowledgebase';
$hesklang['ekb_y']='<b>YES</b>, enable Knowledgebase';
$hesklang['ekb_o']='<b>YES</b>, use HESK as a Knowledgebase only (<i>disable help desk</i>)';
$hesklang['kb_set']='Knowledgebase settings';
$hesklang['kbo1']='Knowledgebase-only mode';
$hesklang['kbo2']='<br /><br />Visitors cannot submit new support tickets and are taken directly to the knowledgebase.';
$hesklang['fpass']='Forgot your password?';
$hesklang['passr']='Password reset';
$hesklang['passa']='Allow users to reset a forgot password over email';
$hesklang['passe']='Enter your email address';
$hesklang['passs']='Send me password reset link';
$hesklang['noace']='No account with that email address was found';
$hesklang['pemls']='We sent you an email with instructions on how to reset your password';
$hesklang['reset_password']='Reset your help desk password'; // Email subject
$hesklang['ehash']='Invalid or expired password reset link';
$hesklang['ehaip']='Wrong IP address. Passwords may only be reset from the IP address that requested password reset.';
$hesklang['resim']='<b>Setup your new password in the form below!</b>';
$hesklang['permissions']='Permissions';
$hesklang['atype']='Account type';
$hesklang['astaff']='Staff';
$hesklang['oon1']='Send me only open tickets';
$hesklang['oon2']='Send me all my tickets';
$hesklang['anyown']='Any owner';
$hesklang['pfr']='Another POP3 fetching task is still in progress.';
$hesklang['pjt']='Task timeout';
$hesklang['pjt2']='minutes after start';
$hesklang['nkba']='Knowledgebase search requires enough unique articles to work properly.<br /><br />Consider adding more articles to the knowledgebase to improve search and article suggestion results.';
$hesklang['saa']='Sticky articles are displayed at the top of articles list';
$hesklang['yhbr']='You have been locked out the system for %s minutes because of too many replies to a ticket.';
$hesklang['sir']='ReCaptcha V1 API (old)';
$hesklang['sir2']='ReCaptcha V2 API (recommended)';
$hesklang['rcpb']='Site key (Public key)';
$hesklang['rcpv']='Secret key (Private key)';

// Language for Google reCaptcha API version 2
// Supported language codes: https://developers.google.com/recaptcha/docs/language
// If your language is NOT in the supported langauges, leave 'en'
$hesklang['RECAPTCHA']='en';


// DO NOT CHANGE BELOW
if (!defined('IN_SCRIPT')) die('PHP syntax OK!');
