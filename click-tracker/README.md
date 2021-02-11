1. implementedscript.js - скрипт для вставки на сайт. 
В requestUrl указать адрес сервера для отправки данных.

2. В resources/views/heatmap.blade.php указать адрес для iframe, с url которого приходят данные по кликам.

3. Создать базу данных clickapi

4. php artisan migrate

   Можно заполнить бд стартовыми данными, чтобы увидеть отображение графика.
  
   php artisan db:seed 
