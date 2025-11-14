Instruções rápidas para instalar dependências:

1) Abra um terminal (cmd, PowerShell ou Git Bash).
2) Vá para a pasta do projeto:
   cd C:\xampp\htdocs\teste\agendamentos-multilojas

3) Execute:
   composer install

   - Se você usa composer.phar local:
     php composer.phar install

4) Verifique se foi criada a pasta "vendor" e o arquivo vendor/autoload.php.

5) Reinicie o Apache se necessário e acesse:
   http://localhost/teste/agendamentos-multilojas/public/

Se não tiver o Composer instalado, siga:
https://getcomposer.org/download/
