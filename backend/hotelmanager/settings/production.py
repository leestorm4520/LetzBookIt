from .base import *

import django_heroku
import psycopg2
import dj_database_url

DEBUG = True

# heroku postgres setup
# SECRET_KEY = os.os.environ.getiron.get('SECRET_KEY')
# EMAIL_HOST_USER = os.os.environ.getiron.get('EMAIL_HOST_USER')
# EMAIL_HOST_PASSWORD = os.os.environ.getiron.get('EMAIL_HOST_PASSWORD')
DATABASES = {
    # 'default': {
    #     'ENGINE': 'django.db.backends.postgresql_psycopg2',
    #     'NAME': os.environ.get('POSTGRES_DB_NAME'),
    #     'USER': os.environ.get('POSTGRES_USER'),
    #     'PASSWORD': os.environ.get('POSTGRES_PASSWORD'),
    #     'HOST': os.environ.get('POSTGRES_HOST'),
    #     'PORT': os.environ.get('POSTGRES_PORT'),
    # }
}

DATABASES.update({"default": dj_database_url.config(conn_max_age=600)})

ALLOWED_HOSTS = ['cs3773-hotelmanager.herokuapp.com',
                 '127.0.0.1']

# whitenoise
COMPRESS_OFFLINE = True
COMPRESS_CSS_FILTERS = [
    "compressor.filters.css_default.CssAbsoluteFitler",
    "compressor.filters.cssmin.CSSMinFilter",
]

COMPRESS_CSS_HASHING_METHOD = "content"


try:
    from .local import *
except ImportError:
    pass

django_heroku.settings(locals())
