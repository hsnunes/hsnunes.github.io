<?php

if (resolve('/')) {
    render('home', 'site');
} elseif (resolve('/contato')) {
    render('contato', 'site');
} else {
    http_response_code(404);
    echo "Page not Found!";
}