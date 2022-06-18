JSON to List
=
Example of Nginx configuration with HTTP authentication:
---
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name example.com;
    root /srv/example.com/public;
 
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
 
    index index.php;
 
    charset utf-8;

    # For https
    listen 443 ssl;
    listen [::]:443 ssl ipv6only=on;
    ssl_certificate /etc/nginx/ssl/default.crt;
    ssl_certificate_key /etc/nginx/ssl/default.key;
 
    location / {
        try_files $uri $uri/ /index.php?$query_string;
        # Enable HTTP authentication and 
        # give a name to the password-protected area
        auth_basic "Closed site";
        # Path to file with login:password pairs 
        # (like user:{SHA}nU4eI71bcnBGqeO0t9tXvY1u5oQ=)
        auth_basic_user_file conf/htpasswd;
    }
 
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
 
    error_page 404 /index.php;
 
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
 
    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

HTTP authentication enabled, path to .htpasswd:
```
/docker/nginx/sites/.htpasswd