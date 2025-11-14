1) Acesse sem vhost:
   http://localhost/teste/agendamentos-multilojas/public/

2) Para usar agendamentos.local:
   - Copie agendamentos.local.conf para o arquivo de vhosts do Apache (ex.: C:\xampp\apache\conf\extra\httpd-vhosts.conf) ou inclua o bloco.
   - Adicione ao hosts (C:\Windows\System32\drivers\etc\hosts):
       127.0.0.1 agendamentos.local
   - Reinicie o Apache.
   - Acesse: http://agendamentos.local

3) Certifique-se de que mod_rewrite está habilitado (no XAMPP: Apache > Config > httpd.conf -> descomente LoadModule rewrite_module).
4) .htaccess na pasta public garante que index.php seja usado como front-controller.
