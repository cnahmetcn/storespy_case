# Storespy Php Developer Case

## About Case
-	İletişim formu yönetimi için bir REST API tasarlanacak.
-	Gönderilen mesajlar hem DB’ye kaydolacak hem de belli bir mail adresine gönderilecek.
-	4 endpoint olacak;
    - Mesaj gönderme (public)
    - Mesaj listeleme (private)
    - Mesaj görüntüleme (private)
    - Mesaj silme (private)
- Private olan API’ler auth arkasında olacak.
-	Auth için Laravel Sanctum paketi kullanılacak.
-	Mail gönderimi async-queued olarak gerçekleşecek.
-	Mail gönderiminde smtp bilgileri için Mailtrap kullanılabilir.
-	Mesaj listeleme endpointinde pagination ve arama seçenekleri de olacak. Arama keyi girilmişse mesaj metni içerisinde arama yapacak.

## Packages and Programs
- Laravel 8
- PHP 8
- Sanctum
- SQLite
- REST API


