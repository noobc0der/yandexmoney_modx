<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'readme' => 'YandexMoney + Modx 2.X Revo + ShopKeeper

1. Требования
Для использования вам необходим Shopkeeper с использованием FormIt
Тестировалось на Shopkeeper 2.3.5

2. Установка
а) Установить пакет в  "система - управление пакетами".

а)
В чанке формы заказа, в списке способов оплаты указать [[!YandexMoney? &action=`showMethods` ]]
Т.е., например, в чанке shopOrderForm будет:

<select name="payment" style="width:200px;">
	<option value="При получении" [[!+fi.payment:FormItIsSelected=`При получении`]]>При получении</option>
        [[!YandexMoney? &action=`showMethods` ]]
</select>

б)
В чанке страницы заказа, в список хуков FormIt добавить YandexMoneyHook
Т.е., например, чанк orderform_page

[[!FormIt?
&hooks=`spam,shk_fihook,YandexMoneyHook,email,FormItAutoResponder,redirect`
&submitVar=`order`
&emailTpl=`shopOrderReport`
&fiarTpl=`shopOrderReport`
&emailSubject=`В интернет-магазине "[[++site_name]]" сделан новый заказ`
&fiarSubject=`Вы сделали заказ в интернет-магазине "[[++site_name]]"`
&emailTo=`[[++emailsender]]`
&redirectTo=`25`
&validate=`address:required,fullname:required,email:email:required,phone:required`
&errTpl=`<br /><span class="error">[[+error]]</span>`
]]


в) Создать 2 страницы: для успешно завершенного платежа и неуспешно завершенного.

3) Настройка

Перейти в параметры сниппета YandexMoney (Элементы -> сниппеты -> YandexMoney - >YandexMoney)
Разблокировать параметры по умолчанию.
Заполнить параметры в соответствии со своими задачами.
Сохранить.

4) Profit.

',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '98285641efdab01de73ee2ea8ff59cbf',
      'native_key' => 'yandexmoney',
      'filename' => 'modNamespace/7afb9aee11386532263912ef5cd776eb.vehicle',
      'namespace' => 'yandexmoney',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '1ad0290418f86e80ff3f51cfdc345c2b',
      'native_key' => 1,
      'filename' => 'modCategory/122e57bb012a25cc82749b26a9e30f96.vehicle',
      'namespace' => 'yandexmoney',
    ),
  ),
);