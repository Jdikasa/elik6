@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url'), 'color' => '#000000'])
<!-- header here -->
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"
style="display: block; width: 100%; max-width: 130px;" width="130" border="0">
@endcomponent
@endslot

{{-- Body --}}
Cher/chère [Nom de l'employé], <br><br>
J'espère que cet e-mail vous trouve en bonne santé.
Je vous écris pour vous informer qu'une nouvelle tâche vous a été assignée, et
j'ai une entière confiance en votre capacité à la gérer avec compétence et efficacité.
<br><br>
Nous sommes convaincus que vos compétences et votre expertise font de vous la personne
idéale pour cette responsabilité. Votre contribution à ce projet sera extrêmement
précieuse, et nous sommes ravis de vous avoir parmi nous.
<br><br>
Afin d'assurer une exécution sans heurts, veuillez prendre note des éléments
suivants :
<br><br>
- 1. Titre de la tâche :<br>
     {{ $tache->titre }}
- 2. Description de la tâche :<br>
     {{ $tache->titre }}
{{-- @component('mail::table')
|                            |                            |
|----------------------------|----------------------------|
| 1. Titre de la tâche       |: {{ $tache->titre }}       |
| 2. Description de la tâche |: {{ $tache->description }} |
@endcomponent --}}
<br><br>
Veuillez examiner attentivement les détails de la tâche et me contacter si vous
avez des questions ou besoin de clarifications supplémentaires.
<br><br>
Votre dévouement et votre engagement envers l'excellence sont grandement appréciés,
et je suis convaincu(e) que vous obtiendrez des résultats exceptionnels.
<br><br>
Merci pour votre contribution continue au succès de notre équipe.
J'ai hâte de voir vos compétences à l'œuvre une fois de plus.
<br><br>
Cordialement,
<br><br>

{{-- Subcopy --}}
@slot('subcopy')
@component('mail::subcopy')
<!-- subcopy here -->
{{ Auth::user()->agent->nom }} {{ Auth::user()->roles->first()->name }} {{ Auth::user()->currentTeam?->name }}
@endcomponent
@endslot


{{-- Footer --}}
@slot('footer')
@component('mail::footer', ['color' => '#000000'])
You’ve received this email because you subscribed to&nbsp;get our updates.
('Unsubscribe')['#']
{{-- @component('mail::button', ['url' => '#'])
Unsubscribe
@endcomponent --}}
{{-- <a href="" target="_blank" class="Roboto400" style="font-family: Arial, sans-serif; color: #ffffff; font-size: 12px; line-height: 17px; text-decoration: underline;">Unsubscribe</a> --}}
@endcomponent
@endslot
@endcomponent
