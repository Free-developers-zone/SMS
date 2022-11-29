<?php



namespace App\Enums;



enum ProductStatusEnum: string
{

    case Teacher = 'teacher';

    case Student = 'student';

    case administration = 'administration';

    case User = 'user';
}
