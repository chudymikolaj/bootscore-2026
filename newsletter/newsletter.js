function newsletterDownloadFile( file ) {
    const link = document.createElement("a");
    link.style.display = "none";
    link.href = file;

    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const newsletterExportCSVButton = document.querySelector('.newsletter-export-csv');

if ( newsletterExportCSVButton ) {
    const notification  = document.querySelector( '.notification' );
    const spinner       = document.querySelector( '.spinner' );

    newsletterExportCSVButton.addEventListener('click', () => {
        spinner.classList.add( 'is-active' );

        fetch( ajaxurl, {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
                'Access-Control-Allow-Origin': '*'
            },
            body: new URLSearchParams({
                action: 'generate_newsletter_csv',
            })
        })
            .then( async response => {
                let result = await response.text();
                spinner.classList.remove('is-active');
                newsletterDownloadFile(result);
                notification.classList.add('notice', 'notice-success', 'is-dismissible');
                notification.innerHTML = '<p><strong>Success!</strong></p>'
            })
            .catch( (err) => {
                notification.classList.add( 'notice', 'notice-warning', 'is-dismissible' );
                notification.innerHTML = '<p><strong>Error!</strong></p>';
            });
    });
}