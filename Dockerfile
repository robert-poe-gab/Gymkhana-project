# Utilitzem la imatge oficial de PHP amb Apache
FROM php:8.2-apache


# Instal·lem les extensions de PHP necessàries per a MySQL
# i netegem la caché de l'APT per reduir la mida de la imatge.
RUN apt-get update && \
    # && Significa que la comanda següent només s'executarà si la comanda anterior ha finalitzat amb èxit
    apt-get install -y \
    # Aquí pots afegir altres extensions si cal
    # docker-php-ext-install: Aquest és un script que ve inclòs amb les imatges oficials de PHP de Docker.
    # La seva funció és simplificar la compilació i instal·lació d'extensions de PHP.
    # -j$(nproc): Aquesta és una opció de l'script docker-php-ext-install que indica quants processos s'han d'utilitzar per compilar les extensions.
    # $(nproc) és una comanda de shell que retorna el nombre de nuclis de CPU disponibles a la màquina.
    # En combinar-los, el script utilitza tants nuclis de CPU com sigui possible per a la compilació, cosa que fa que el procés sigui més ràpid.
    # mysqli pdo pdo_mysql: Aquests són els noms de les extensions de PHP que es volen instal·lar.
    && docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql \
    # Netejem la caché de l'APT per reduir la mida de la imatge
    && apt-get clean \
    # Eliminar els fitxers temporals de l'APT per reduir encara més la mida de la imatge
    && rm -rf /var/lib/apt/lists/*

# Activem el mòdul de reescriptura d'Apache (mod_rewrite) Necessari per les rutes amigables (Router HTTP)
RUN a2enmod rewrite

# Creem i configurem un fitxer de configuració per a Apache
# Aquest fitxer s'utilitza per habilitar les directives .htaccess
# en el directori de l'aplicació.
COPY ./server/000-default.conf /etc/apache2/sites-available/000-default.conf

# En mode de Desenvolupament pot ser útil activar la visibilitat dels errors (On)
# En mode producció, es recomana desactivar la visibilitat dels errors (Off)
# Afegim a la configuració de PHP per la visibilitat dels errors
RUN echo "display_errors = Off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "display_startup_errors = Off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Copiem els fitxers de l'aplicació al directori d'Apache
# El primer punt '.' es refereix al directori local on es troba el projecte respecte on hi ha el Dockerfile.
# Important! En el moment de construir la imatge només té accés a aquest directori i als seus subdirectoris.
# Per tant, cal assegurar-se que els fitxers de l'aplicació estan en aquest directori.
# El segon és el directori arrel de l'Apache, "/var/www/html"
COPY ./ /var/www/html/

# Donem permisos al directori de l'aplicació
# Si no es dona permisos d'escriptura no es podran pujar imatges.
RUN chown -R www-data:www-data /var/www/html/public && \
    chmod -R 755 /var/www/html/public 
    
# Exposem el port 80 per accedir a l'aplicació des de fora del contenidor
EXPOSE 80