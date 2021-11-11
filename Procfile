release: python hotelmanager/manage.py migrate
web: gunicorn --workers 2 --chdir backend --pythonpath=hotelmanager wsgi --log-file - 
