## Basit seviyede endeksleme uygulamasıdır

Yapabildikleriniz:

- Sadece admin panelinden ibarettir,
- Login olarak giriş yapabilirsiniz (şifre: **123456**, kullancı adı: **55selcukozdemir**),
- Sadece bulunduğunuz yıla göre veri girişi sağlanıyor çünkü yılı anlık olarak bulunduğu zamana göre çekiyor ileride değişecek istenilen zamana göre veri girişi sağlanacaktır,
- girilen veriler ana ekranda tekil olarak sorgulanabilir, sorgular kapsayıcı şekilde ilerlemektedir. 
>**Örneğin:** bir mahalle verisini çekmek istediğinizi var sayalım, eğer mahalle verisi girilmemişse bağlı olduğu ilçenin endeks verisi çekilir gösterilir, o da yoksa ilin verisi getirilir, hiç veriye ulaşılamadıysa tüm değerler **0** olarak döner.

İlerleyen zamanlarda neler eklenebilir:

1. Endeks verileri doğruluğu artması açısından ortalama değerler alınabilir.
2. Hesap oluşturma (alt yapısı vardır).
3. Girilen endekslerin harita üzerinde görünmesi sağlanabilir (alt yapısı vardır).
4. Veri gösterme olayını harita üzerinden seçmek sureti ile gösterilmesi sağlanılabilir.


demo: https://selcukozdemir.space/endeks/public/
