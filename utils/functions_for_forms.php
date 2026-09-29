<?php


/** ---------------------------------------------------------------------------------------------
 * Send email (contact from)
 * --------------------------------------------------------------------------------------------- */

/** ---------------------------------------------------------------------------------------------
 * SMTP Configuration
 * --------------------------------------------------------------------------------------------- */
add_action('phpmailer_init', 'smtp_configuration');
function smtp_configuration($phpmailer)
{
  $phpmailer->isSMTP();
  $phpmailer->Host = 's45.cyber-folks.pl';
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = 'ssl';
  $phpmailer->Port = '465';
  $phpmailer->Username = 'patronusec@jlkseocpye.cfolks.pl';
  $phpmailer->Password = '*F4SqBa8Fd8-l-SA';
  $phpmailer->From = 'patronusec@jlkseocpye.cfolks.pl';
  $phpmailer->FromName = 'Patronusec';
}


add_action('wp_ajax_contact_form_send_email', 'contact_form_send_email');
add_action('wp_ajax_nopriv_contact_form_send_email', 'contact_form_send_email');
function contact_form_send_email()
{
  $headers = ['Content-Type: text/html; charset=UTF-8', 'Reply-to: ' . sanitize_text_field($_POST['email'])];
  $subject = "Wiadomość z formularza kontaktowego Patronusec.com";
  $body = '<strong>Email:</strong> ' . sanitize_text_field($_POST['email']) . '<br/>';
  $body .= '<strong>Telefon:</strong> ' . sanitize_text_field($_POST['phone']) . '<br/><br/>';
  $body .= '<strong>Wiadomość:</strong><br/>' . sanitize_text_field($_POST['message']);

  wp_mail('hello@patronusec.com', $subject, $body, $headers);

  wp_die();
}

/** ---------------------------------------------------------------------------------------------
 * Newsletter - sign up
 * --------------------------------------------------------------------------------------------- */
add_action('wp_ajax_sign_up_newsletter', 'sign_up_newsletter');
add_action('wp_ajax_nopriv_sign_up_newsletter', 'sign_up_newsletter');
function sign_up_newsletter()
{
  $email = sanitize_text_field($_POST['email']);
  $name = sanitize_text_field($_POST['name']);

  add_newsletter_row($email, $name);

  wp_die();
}

/** ---------------------------------------------------------------------------------------------
 * Newsletter - get DB configuration
 * --------------------------------------------------------------------------------------------- */
function get_newsletter_external_DB_configuration()
{
  return [
    'hostname' => 'localhost',
    'user' => 'srv72760_pat765',
    'password' => 'nBC7HcSfXjB9fmuEyceM',
    'database' => 'srv72760_pat765'
  ];
}

/** ---------------------------------------------------------------------------------------------
 * Newsletter - email exists
 * --------------------------------------------------------------------------------------------- */
function check_newsletter_email_exists($email)
{
  $externalDB = get_newsletter_external_DB_configuration();

  $con = new mysqli(
    $externalDB['hostname'],
    $externalDB['user'],
    $externalDB['password'],
    $externalDB['database']
  );

  $result = [];

  if (!$con->connect_errno) {
    $con->set_charset("utf8");
    $query = $con->prepare("SELECT email FROM newsletter WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $query->bind_result($result);
    $query->fetch();
  }

  $con->close();

  if ($result) {
    return true;
  }

  return false;
}

/** ---------------------------------------------------------------------------------------------
 * Newsletter - add row to DB
 * --------------------------------------------------------------------------------------------- */
add_action('wp_ajax_nopriv_add_newsletter_row', 'add_newsletter_row');
add_action('wp_ajax_add_newsletter_row', 'add_newsletter_row');
function add_newsletter_row($email, $name)
{
  date_default_timezone_set('Europe/Warsaw');

  $dateTime = date('y-m-d H:i:s');

  if (filter_var($email, FILTER_VALIDATE_EMAIL) && check_newsletter_email_exists($email) === false) {
    $externalDB = get_newsletter_external_DB_configuration();

    $con = new mysqli(
      $externalDB['hostname'],
      $externalDB['user'],
      $externalDB['password'],
      $externalDB['database']
    );

    if (!$con->connect_errno) {
      $newRow = $con->prepare("INSERT INTO newsletter (email, name, creation_date) VALUES (?, ?, ?)");
      $newRow->bind_param("sss", $email, $name, $dateTime);
      $newRow->execute();
    }

    $con->close();
  }
}

/** ---------------------------------------------------------------------------------------------
 * Newsletter - get data
 * --------------------------------------------------------------------------------------------- */
function get_newsletter_external_DB_data()
{
  $externalDB = get_newsletter_external_DB_configuration();

  $con = new mysqli(
    $externalDB['hostname'],
    $externalDB['user'],
    $externalDB['password'],
    $externalDB['database']
  );

  $result = [];

  if (!$con->connect_errno) {
    $con->set_charset("utf8");

    $query = $con->query("SELECT id, email, name, creation_date FROM newsletter");

    if ($query) {
      $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    $query->free_result();
  }

  $con->close();

  return $result;
}

/** ---------------------------------------------------------------------------------------------
 * Admin scripts
 * --------------------------------------------------------------------------------------------- */
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');
function enqueue_admin_scripts()
{
  wp_enqueue_script('newsletter', get_stylesheet_directory_uri() . '/newsletter/newsletter.js', [], '1.0.0', true);
}

/** ---------------------------------------------------------------------------------------------
 * Newsletter - create admin page
 * --------------------------------------------------------------------------------------------- */
add_action('admin_menu', 'create_newsletter_admin_page', 20);
function create_newsletter_admin_page()
{
  add_submenu_page(
    'tools.php',
    'Newsletter CSV',
    'Newsletter CSV',
    'manage_options',
    'newsletter',
    'newsletter_admin_page_content'
  );
}

function newsletter_admin_page_content()
{
  include_once 'newsletter/admin-page.php';
}

/** ---------------------------------------------------------------------------------------------
 * Newsletter - generate CSV
 * --------------------------------------------------------------------------------------------- */
add_action('wp_ajax_generate_newsletter_csv', 'generate_newsletter_csv');
function generate_newsletter_csv()
{
  $fileName = 'newsletter-' . date('Y-m-d') . '-' . random_int(1000, 100000) . '.csv';
  $dirPath = WP_CONTENT_DIR . '/newsletter-csv/';
  $filePath = $dirPath . $fileName;

  if (!is_dir($dirPath)) {
    mkdir($dirPath);
  } else {
    clean_newsletter_directory();
  }

  $fileURL = content_url() . '/newsletter-csv/' . $fileName;
  $csvHeader = array('ID', 'E-mail', 'Name', 'Creation date');

  $file = fopen($filePath, "w");

  fputcsv($file, $csvHeader);

  foreach (get_newsletter_external_DB_data() as $row) {
    $result = array(
      $row['id'],
      $row['email'],
      $row['name'],
      $row['creation_date'],
    );

    fputcsv($file, $result);
  }

  fclose($file);

  echo $fileURL;

  wp_die();
}

/** ---------------------------------------------------------------------------------------------
 * Newsletter - clean directory
 * --------------------------------------------------------------------------------------------- */
function clean_newsletter_directory()
{
  $newsletterDirPath = WP_CONTENT_DIR . '/newsletter-csv/';

  if (is_dir($newsletterDirPath)) {
    $files = glob($newsletterDirPath . '*');

    foreach ($files as $file) {
      if (is_file($file)) {
        unlink($file);
      }
    }
  }
}