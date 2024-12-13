import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { UserService } from '../../services/user.service';
import { User } from '../../models/user.model';

@Component({
  selector: 'app-user-form',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './user-form.component.html',
  styleUrls: ['./user-form.component.scss']
})
export class UserFormComponent {
  user: User = { name: '', email: '' };

  constructor(private userService: UserService) { }

  onSubmit(): void {
    this.userService.createUser(this.user).subscribe(
      () => {
        console.log('Usuário criado com sucesso');
        this.user = { name: '', email: '' };
      },
      (error) => console.error('Erro ao criar usuário:', error)
    );
  }
}