<?php

//auth_protection();

if (resolve('/admin/?')){
    render('painel', 'admin');
}elseif (resolve('/admin/auth.*')) {
    include __DIR__ . '/auth/routes.php';
}elseif (resolve('/admin/usuarios.*')) {
    include __DIR__ . '/usuarios/routes.php';
}else{
    http_response_code(404);
    echo "Page Not Found!";
}