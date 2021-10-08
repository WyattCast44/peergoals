<div>

    @if (session('resent'))
        <x-alerts.success message="A fresh verification link has been sent to your email address." />
    @endif

    <p>
        Before proceeding, please check your email for a verification link. If you did not receive the email, <button wire:click="resend" class="btn-link">click here to request another</button>.
    </p>

</div>
