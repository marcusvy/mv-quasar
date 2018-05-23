import { QuasarMenu } from '../../lib/menu/quasar-menu';

export const QUASAR_MENU_DATASOURCE: QuasarMenu[] = [
  {
    header: "Geral",
    children: [
      { label: "Dashboard", router: "/", description: "Resumo geral da aplicação" },
      { label: "Estatísticas", router: "/stats", description: "Estatísticas de controle de sistema" },
      { label: "Conta", router: "/perfil", description: "Alteração de dados pessoais" },
      { label: "Relatórios", router: "/report", description: "Impressão de relatórios" },
    ]
  },
  {
    header: "Publicações",
    children: [
      { label: "Notícias", router: "/publish/new", description: "Publicação de notícias e posts" },
      { label: "Banners", router: "/publish/banner", description: "Publicação de banners" },
    ]
  },
  {
    header: "Mídia",
    children: [
      { label: "Gerenciador", router: "/midia", description: "Gestor de Mídias" },
      { label: "Audioteca", router: "/midia/audio", description: "Gestão de arquivos de áudio" },
      { label: "Galeria", router: "/midia/image", description: "Gestão de arquivos de imagem" },
      { label: "Videoteca", router: "/midia/video", description: "Gestão de arquivos de vídeo" },
    ]
  },
  {
    header: "Autenticação",
    children: [
      { label: "Usuário", router: "/user", description: "Controle de usuários"  },
      { label: "Perfil", router: "/user/perfil", description: "Controle de dados pessoais" },
      { label: "Responsabilidade", router: "/user/role", description: "Controle de responsabilidades no sistema" },
    ]
  },
  {
    header: "Configuração",
    children: [
      { label: "Geral", router: "/config", description: "Configurações gerais" },
      { label: "E-mail", router: "/config/mail", description: "Configuração de e-mail" },
      { label: "Monitoramento", router: "/config/log", description: "Monitoramento do sistema" },
    ]
  },
  {
    header: "Suporte",
    children: [
      { label: "Ajuda", router: "/suport/help", description: "Ajuda e documentação" },
      { label: "Assinatura", router: "/suport/sign", description: "Detalhes da assinatura e pagamento" },
      { label: "Atendimento", router: "/suport/sac", description: "Ordens de Serviço"},
      { label: "Produtos", router: "/store", description: "Conhecer mais produtos e ofertas" },
      { label: "Módulos", router: "/store", description: "Adicionar mais módulos" },
    ]
  },
];
