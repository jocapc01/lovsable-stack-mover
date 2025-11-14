// Update this page (the content is just a fallback if you fail to update the page)

const Index = () => {
  return (
    <div className="flex min-h-screen flex-col items-center justify-center bg-background">
      <div className="text-center">
        <h1 className="mb-4 text-5xl font-bold text-foreground">Sistema de Agendamentos</h1>
        <p className="mb-8 text-xl text-muted-foreground">Gerencie seus agendamentos de forma simples e eficiente</p>
        <a 
          href="/dashboard" 
          className="inline-flex items-center rounded-lg bg-primary px-6 py-3 text-lg font-semibold text-primary-foreground transition-all hover:bg-primary/90"
        >
          Acessar Dashboard
        </a>
      </div>
    </div>
  );
};

export default Index;
