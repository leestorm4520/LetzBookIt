from django.db import models
# from django.contrib.postgres.fields import ArrayField

from wagtailstreamforms.models.abstract import AbstractFormSetting

from wagtailmenus.models import MenuPage


class GenericPage(MenuPage):
    """
    This is the main project page with universal attributes and such
    """
    # this makes sure the user will not actually create a page of this type
    # SHOULD BE OVERWRITTEN OR IT WILL NOT DISPLAY
    parent_page_types = []


class AdvancedFormSetting(AbstractFormSetting):
    from_address = models.EmailField(blank=True)
    to_address = models.EmailField(blank=True)
    # to_addresses = ArrayField(models.EmailField(), blank=True)
    description = models.CharField(max_length=255)
