@component('mail::message')
# @lang('Recebemos um novo contato!')

> **@lang('Pessoa:')** {{ $form['personType'] }}<br/>
@if($form['personType'] === 'pf')
> **@lang('Nome:')** {{ $form['name'] }}<br/>
> **@lang('CPF:')** {{ $form['document'] }}<br/>
@else
> **@lang('Nome:')** {{ $form['name'] }}<br/>
> **@lang('Nome fantasia:')** {{ $form['fantasyName'] }}<br/>
> **@lang('Cargo do Contato:')** {{ $form['contactRole'] }}<br/>
> **@lang('Setor do Contato:')** {{ $form['contactSector'] }}<br/>
> **@lang('CNPJ:')** {{ $form['documentAlt'] }}<br/>
@endif
> **@lang('CEP:')** {{ $form['zipcode'] }}<br/>
> **@lang('UF:')** {{ $form['state'] }}<br/>
> **@lang('Cidade:')** {{ $form['city'] }}<br/>
> **@lang('Bairro:')** {{ $form['district'] }}<br/>
> **@lang('Rua:')** {{ $form['street'] }}<br/>
> **@lang('Número:')** {{ $form['number'] }}<br/>
> **@lang('Complemento:')** {{ $form['complement'] }}<br/>
> **@lang('Email:')** {{ $form['email'] }}<br/>
> **@lang('Celular:')** {{ $form['whatsapp'] }}<br/>
> **@lang('Telefone:')** {{ $form['phone'] }}<br/>
> **@lang('Assunto:')** {{ $form['subject'] }}<br/>
> **@lang('Mensagem:')** {{ $form['message'] }}<br/>

@lang('Saudações,')<br/>
{{ config('app.name') }}
@endcomponent
