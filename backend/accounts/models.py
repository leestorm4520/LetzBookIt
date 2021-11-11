from django.db import models
from django.conf import settings
from django.utils import timezone
from django.contrib.auth.models import AbstractBaseUser, PermissionsMixin
from django.contrib.auth.models import BaseUserManager
from django.utils.translation import ugettext_lazy as _

from django.core.validators import MaxValueValidator, MinValueValidator 

from creditcards.models import CardNumberField, CardExpiryField, SecurityCodeField
from address.models import AddressField


class CustomUserManager(BaseUserManager):
    """
    Custom user model manager where email is the unique identifiers
    for authentication instead of usernames.
    """
    def create_user(self, email, password, **extra_fields):
        """
        Create and save a User with the given email and password.
        """
        if not email:
            raise ValueError(_('The Email must be set'))
        email = self.normalize_email(email)
        user = self.model(email=email, **extra_fields)
        user.set_password(password)
        user.save()
        return user

    def create_superuser(self, email, password, **extra_fields):
        """
        Create and save a SuperUser with the given email and password.
        """
        extra_fields.setdefault('is_staff', True)
        extra_fields.setdefault('is_superuser', True)
        extra_fields.setdefault('is_active', True)

        if extra_fields.get('is_staff') is not True:
            raise ValueError(_('Superuser must have is_staff=True.'))
        if extra_fields.get('is_superuser') is not True:
            raise ValueError(_('Superuser must have is_superuser=True.'))
        return self.create_user(email, password, **extra_fields)


class CustomUser(AbstractBaseUser, PermissionsMixin):
    email = models.EmailField(_('email address'), unique=True)
    is_staff = models.BooleanField(default=False)
    is_active = models.BooleanField(default=True)
    date_joined = models.DateTimeField(default=timezone.now)

    USERNAME_FIELD = 'email'
    REQUIRED_FIELDS = []

    objects = CustomUserManager()

    def __str__(self):
        return self.email


class CardPaymentMethod(models.Model):
    address = AddressField()

    cc_number = CardNumberField(_('card number'))
    cc_expiry = CardExpiryField(_('expiration date'))
    cc_code = SecurityCodeField(_('security code'))


class CustomUserProfile(models.Model):
    # relates profile to user
    user = models.OneToOneField(CustomUser, related_name="profile", on_delete=models.CASCADE)

    # name
    first_name = models.CharField(max_length=30)
    last_name = models.CharField(max_length=60)

    # payment methods
    payment_methods = models.ForeignKey(CardPaymentMethod,
                                        related_name="payment_method",
                                        on_delete=models.CASCADE)

    # the base user information
    language = models.CharField(max_length=7, choices=settings.LANGUAGES)

    def __str__(self):
        return f"Profile of user: {self.last_name}, {self.first_name}"

